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

    public function login(Request $request): array
    {
        $user = $this->model->where('phone_number', $request['phone_number'])->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return [
                'data' => null
            ];
        }

        $credentials = $request->only(['phone_number', 'password']);

        if (!$token = auth()->setTTL(30)->attempt($credentials)) {
            return ['message' => 'Unauthorized'];
        }

        return $this->respondWithToken($token);
    }

    //Add this method to the Controller class

    /**
     * Đây là hàm trả về token
     * */
    #[ArrayShape(['token' => "", 'token_type' => "string", 'expires_in' => "float|int"])]
    protected function respondWithToken($token): array
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Carbon::now()->addSeconds(auth()->factory()->getTTL() * 60)->utc()->toDateTimeString()
        ];
    }

    #[ArrayShape(['message' => "string"])]
    public function logout(): array
    {
        auth()->logout();
        return [
            "data" => true,
            'message' => 'User logged off successfully!'
        ];
    }

    public function register(Request $request): array
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

    protected function refreshToken()
    {

    }
}
