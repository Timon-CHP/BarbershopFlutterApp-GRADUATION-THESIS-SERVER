<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;
use Throwable;
use YaangVu\LaravelBase\Services\impl\BaseService;


class AuthService extends BaseService
{
    function createModel(): void
    {
        $this->model = new User();
    }

    public function me()
    {
        return ["data" => auth()->user()];
    }

    public function loginWithPhoneNumber(Request $request): array
    {
        $user = $this->model->where('phone_number', $request['phone_number'])->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return [
                'data' => null
            ];
        }

//        $token = $user->createToken('loginToken')->plainTextToken;
        $credentials = $request->only(['phone_number', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return ['message' => 'Unauthorized'];
        }

        return $this->respondWithToken($token);
    }

    //Add this method to the Controller class
    protected function respondWithToken($token)
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    #[ArrayShape(['user' => "mixed", "token" => "mixed"])]
    public function loginWithSocial(Request $request): array
    {
        $user = User::where('phone_number', $request['phone_number'])->first();;

        $token = $user->createToken('loginToken')->plainTextToken;

        return [
            'user' => $user,
            "token" => $token,
        ];
    }

    public function register(Request $request)
    {
        try {
            $user = User::create([
                'phone_number' => $request['phone_number'],
                'name' => $request['name'],
                'password' => Hash::make($request['password'])
            ]);
            return [
                "data" => $user,
            ];
        } catch (Throwable) {
            return [
                "data" => null,
                'message' => __('auth.failed')
            ];
        }
    }
}
