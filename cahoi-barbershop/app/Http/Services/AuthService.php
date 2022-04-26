<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;
use Throwable;

class AuthService
{
    protected int $TYPE_WITH_FACEBOOK = 1;
    protected int $TYPE_WITH_GOOGLE = 2;

    #[ArrayShape(['data' => "bool"])]
    public function checkUserExisted($phone_number): array
    {
        $user = User::all()->where('phone_number', $phone_number)->first();

        return [
            'data' => (bool)$user,
        ];
    }

    public function register($request): array
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        try {
            $user = new User();
            $user->password = $validated['password'];
            $user->name = $validated['name'];
            $user->phone_number = $validated['phone_number'];
            $user->save();

            $token = $user->createToken('regisToken')->plainTextToken;

            return [
                'user' => [
                    'id' => $user->id . '',
                    'name' => $user->name . '',
                    'phone_number' => $user->phone_number . '',
                    'email' => $user->email . '',
                    'birthday' => $user->birthday . '',
                ],
            ];
        } catch (Throwable) {
            return [
                'user' => null,
                'msg' => __('auth.failed')
            ];
        }
    }

    public function loginWithPhoneNumber($request): array
    {
        $validated = $request->validated();
        // Check phone number
        $user = User::all()->where('phone_number', $validated['phone_number'])->first();

        // Check password
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return [
                'user' => null,
                'token' => null,
                'msg' => __('auth.failed')];
        }
        $token = $user->createToken('loginToken')->plainTextToken;

        return [
            'user' => [
                'id' => $user->id . '',
                'name' => $user->name . '',
                'phone_number' => $user->phone_number . '',
                'email' => $user->email . '',
                'birthday' => $user->birthday . '',
            ],
            'token' => '' . $token,
        ];
    }

    #[ArrayShape(['user' => "string[]", 'token' => "string"])]
    public function loginWithSocials($request, $typeSocial): array
    {
        $validated = $request;

        if ($typeSocial == $this->TYPE_WITH_GOOGLE || $typeSocial == $this->TYPE_WITH_FACEBOOK) {
            $validated = $request->validate([
                'name' => 'string|required',
                'email' => 'string|required|email:rfc,dns|max:100',
                'provider_id' => 'string|required|max:100',
            ]);
        }

        // Check phone number
        $user = User::all()->where('provider_name', $typeSocial)
            ->where('provider_id', $validated['provider_id'])->first();

        // Check password
        if (!$user) {
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->provider_id = $validated['provider_id'];
            $user->provider_name = $typeSocial;
            $user->save();
        }
        $token = $user->createToken('loginToken')->plainTextToken;

        return [
            'user' => [
                'id' => $user->id . '',
                'name' => $user->name . '',
                'phone_number' => $user->phone_number . '',
                'email' => $user->email . '',
                'birthday' => $user->birthday . '',
                'home_address' => $user->home_address . '',
                'work_address' => $user->work_address . '',
                'provider_id' => $user->provider_id . '',
                'provider_name' => $user->provider_name . '',
            ],
            'token' => '' . $token,
        ];
    }

    public function resetPassword($request): array
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        $user = User::all()->where('phone_number', $validated['phone_number'])->first();

        if (!$user) {
            return [
                'data' => false,
            ];
        } else {
            $user->password = $validated['password'];

            $user->save();

            return [
                'data' => true,
            ];
        }
    }

    #[ArrayShape(['msg' => "string"])] public function logout(): array
    {
        // Logout trên tất cả các thiết bị
        // Auth::user()->tokens->each(function($token, $key) {
        //     $token->delete();
        // });

        // Logout owr 1 thiết bị

        $user = request()->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return [
            'msg' => 'Successfully logged out',
        ];
    }
}
