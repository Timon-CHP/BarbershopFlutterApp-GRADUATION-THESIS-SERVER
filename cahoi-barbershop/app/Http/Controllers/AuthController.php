<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private $authService;

    protected $TYPE_WITH_FACEBOOK = 1;
    protected $TYPE_WITH_GOOGLE = 2;
    protected $TYPE_WITH_ZALO = 3;


    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(UserRegister $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        try {
            $response = $this->authService->register(
                $request->phone_number,
                $request->name,
                $validated['password']
            );
            return response([
                'data' => $response,
                'status' => Response::HTTP_OK,
                'msg' => 'successfully'
            ]);
        } catch (\Throwable $th) {
            // dd($th);
            return response([
                'data' => '',
                'status' => Response::HTTP_BAD_REQUEST,
                'msg' => 'fail'
            ]);
        }
    }

    public function loginWithPhoneNumber(UserLogin $request)
    {
        $validated = $request->validated();
        try {

            $response = $this->authService->loginWithPhoneNumber($validated);

            return response()->json([
                'data' => $response,
                'status' => Response::HTTP_OK,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => $response,
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            ]);
        }
    }

    public function loginWithSocials(Request $request, $typeLogin)
    {
        if ($typeLogin == $this->TYPE_WITH_GOOGLE || $typeLogin == $this->TYPE_WITH_FACEBOOK) {
            $validated = $request->validate([
                'name' => 'string|required',
                'email' => 'string|required|email:rfc,dns|max:100',
                'provider_id' => 'string|required|max:100',
            ]);
        } elseif ($typeLogin == $this->TYPE_WITH_ZALO) {
            $validated = $request->validate([
                'name' => 'string|required',
                'email' => 'string|required|email:rfc,dns|max:100',
                'provider_id' => 'string|required|max:100',
            ]);
        }

        try {
            if ($typeLogin == $this->TYPE_WITH_GOOGLE) {
                $response = $this->authService->loginWithGoogleFacebook($validated, $this->TYPE_WITH_GOOGLE);
            } elseif ($typeLogin == $this->TYPE_WITH_FACEBOOK) {
                $response = $this->authService->loginWithGoogleFacebook($validated, $this->TYPE_WITH_FACEBOOK);
            } elseif ($typeLogin == $this->TYPE_WITH_ZALO) {
                $response = $this->authService->loginWithZalo();
            }

            return response()->json([
                'data' => $response,
                'status' => Response::HTTP_OK,
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                // 'data' => $response,
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            ]);
        }
    }

    public function logout(Request $request)
    {
        // Logout trên tất cả các thiết bị
        // Auth::user()->tokens->each(function($token, $key) {
        //     $token->delete();
        // });

        // Logout owr 1 thiết bị
        $user = request()->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'msg' => 'Successfully logged out',
        ],);
    }

    public function checkUserExisted(Request $request, string $phone_number)
    {
        try {
            $user = $this->authService->checkUserExisted($phone_number);

            return response()->json([
                'data' => $user ? true : false,
                'status' => Response::HTTP_OK,
                'msg' => 'User does existed!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => 'null',
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'msg' => '',
            ]);
        }
    }
}
