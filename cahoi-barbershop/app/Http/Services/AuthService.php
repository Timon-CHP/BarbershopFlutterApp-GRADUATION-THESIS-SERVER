<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthService
{
    protected int $TYPE_WITH_FACEBOOK = 1;
    protected int $TYPE_WITH_GOOGLE = 2;
    protected int $TYPE_WITH_ZALO = 3;

    public function checkUserExisted($phone_number): JsonResponse
    {
        $user = User::all()->where('phone_number', $phone_number)->first();

        return response()->json([
            'data' => (bool)$user,
        ]);
    }

    public function register($request): JsonResponse
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        try {
//            $user = User::create([
//                'password' => $validated['password'],
//                'name' => $validated['name'],
//                'phone_number' => $validated['phone_number']
//            ]);
        $user = new User();
        $user->password = $validated['password'];
        $user->name = $validated['name'];
        $user->phone_number = $validated['phone_number'];
        $user->save();

        $token = $user->createToken('regisToken')->plainTextToken;

        return response()->json([
            'user' => [
                'id' => $user->id . '',
                'name' => $user->name . '',
                'phone_number' => $user->phone_number . '',
                'email' => $user->email . '',
                'birthday' => $user->birthday . '',
                'home_address' => $user->home_address . '',
                'work_address' => $user->work_address . '',
            ],
            'token' => $token,
        ]);
        } catch (Throwable) {
            return response()->json([
                'msg' => __('auth.failed')
            ], 401);
        }
    }

    public function loginWithPhoneNumber($request): JsonResponse
    {
        $validated = $request->validated();
        // Check phone number
        $user = User::all()->where('phone_number', $validated['phone_number'])->first();

        // Check password
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['msg'=>__('auth.failed')], 401);
        }
        $token = $user->createToken('loginToken')->plainTextToken;

        return response()->json([
            'user' => [
                'id' => $user->id . '',
                'name' => $user->name . '',
                'phone_number' => $user->phone_number . '',
                'email' => $user->email . '',
                'birthday' => $user->birthday . '',
                'home_address' => $user->home_address . '',
                'work_address' => $user->work_address . '',
            ],
            'token' => '' . $token,
        ]);
    }

    public function loginWithSocials($request, $typeSocial): JsonResponse
    {
        $validated = $request;

        if ($typeSocial == $this->TYPE_WITH_GOOGLE || $typeSocial == $this->TYPE_WITH_FACEBOOK) {
            $validated = $request->validate([
                'name' => 'string|required',
                'email' => 'string|required|email:rfc,dns|max:100',
                'provider_id' => 'string|required|max:100',
            ]);
        } elseif ($typeSocial == $this->TYPE_WITH_ZALO) {
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

        return response()->json([
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
        ]);
    }

    public function resetPassword($request): JsonResponse
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        $user = User::all()->where('phone_number', $validated['phone_number'])->first();

        if (!$user) {
            return response()->json([
                'data' => false,
            ], 401);
        } else {
            $user->password = $validated['password'];

            $user->save();

            return response()->json([
                'data' => true,
            ]);
        }
    }

    public function logout(): JsonResponse
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
        ]);
    }
}
