<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;
use Throwable;
use YaangVu\LaravelBase\Services\impl\BaseService;


/**
 * Đơn vị của TTL là phút
 * */
class AuthService extends BaseService
{
    function createModel(): void
    {
        $this->model = new User();
    }

    #[ArrayShape(["data" => "bool"])]
    public function logout(): array
    {
        auth()->logout();

        return [
            "data" => true
        ];
    }

    public function register(Request $request): array
    {
        try {
            $user = $this->model->create([
                                             'phone_number' => $request['phone_number'],
                                             'name'         => $request['name'],
                                             'password'     => Hash::make($request['password'])
                                         ]);


            if (!$user) {
                return [
                    "data" => false,
                ];
            }

            $user->assignRole(['customer']);

            return [
                "data" => true,
            ];

        } catch (Throwable) {
            return [
                "data"    => null,
                'message' => __('fail!')
            ];
        }
    }

    public function loginWithFacebook(Request $request): array
    {
        $rule = [
            'name'        => 'required',
            'provider_id' => 'required',
        ];

        $this->doValidate($request, $rule);

        try {
            $user = $this->model
                ->where("type_provider", "facebook")
                ->Where("provider_id", $request['provider_id'])
                ->orWhere("email", $request['email'])
                ->first();

            if (!$user) {
                $user = $this->model->create([
                                                 "name"          => $request->name,
                                                 "email"         => $request->email,
                                                 "type_provider" => "facebook",
                                                 "provider_id"   => $request->provider_id,
                                             ]);

                $user->assignRole(['customer']);
            }

            return [
                "data" => $this->login($user)
            ];
        } catch (Throwable $exception) {
            return [
                'data'    => null,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function login(User $user): array
    {
        if (!$token = auth()->setTTL(24 * 30 * 60)->login($user)) {
            return ['message' => 'Unauthorized'];
        }

        return $this->respondWithToken($token);
    }

    /**
     * Đây là hàm trả về token
     * */
    #[ArrayShape(['token' => "", 'token_type' => "string", 'expires_in' => "float|int"])]
    protected function respondWithToken($token): array
    {
        return [
            'token'      => $token,
            'token_type' => 'bearer',
            'expires_in' => Carbon::now()->addSeconds(auth()->factory()->getTTL() * 60)->utc()->toDateTimeString()
        ];
    }

    public function loginWithGoogle(Request $request): array
    {
        try {
            $user = $this->model
                ->where("type_provider", '=', "google")
                ->Where("provider_id", $request['provider_id'])
                ->orWhere("email", $request['email'])
                ->first();
            if (!$user) {
                $user = $this->model->create([
                                                 "name"          => $request['name'],
                                                 "email"         => $request['email'],
                                                 "type_provider" => "google",
                                                 "provider_id"   => $request['provider_id'],
                                             ]);

                $user->assignRole(['customer']);
            }

            return [
                "data" => $this->login($user)
            ];
        } catch (Throwable $exception) {
            return [
                'data'    => null,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function loginWithPhoneNumber(Request $request): array
    {
        $user = $this->model->where('phone_number', $request['phone_number'])->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return [
                "data" => null
            ];
        }

        return [
            "data" => $this->login($user)
        ];
    }

    public
    function refreshToken(): array
    {
        return $this->respondWithToken(auth()->setTTL(24 * 60 * 30)->refresh());
    }
}
