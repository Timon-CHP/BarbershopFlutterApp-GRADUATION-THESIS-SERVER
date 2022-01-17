<?php

namespace App\Http\Services;

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function checkUserExisted($phone_number)
    {
        return User::all()->where('phone_number', $phone_number)->first();
    }

    public function register($phone_number, $name, $password)
    {
        $user = User::create([
            'password' =>  $password,
            'name' => $name,
            'phone_number' => $phone_number,
        ]);
        $token = $user->createToken('regisToken')->plainTextToken;
        $response = [
            'user' => [
                'user_id' => $user->user_id . '',
                'name' => $user->name . '',
                'phone_number' => $user->phone_number . '',
                'email' => $user->email . '',
                'birthday' => $user->birthday . '',
                'home_address' => $user->home_address . '',
                'work_address' => $user->work_address . '',
            ],
            'token' => '' . $token,
        ];
        return $response;
    }

    public function loginWithPhoneNumber($validated)
    {
        // Check phone number
        $user = User::where('phone_number', $validated['phone_number'])->first();

        // Check password
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'msg' => 'Bad creds'
            ], 401);
        }
        $token = $user->createToken('loginToken')->plainTextToken;

        $response = [
            'user' => [
                'user_id' => $user->user_id . '',
                'name' => $user->name . '',
                'phone_number' => $user->phone_number . '',
                'email' => $user->email . '',
                'birthday' => $user->birthday . '',
                'home_address' => $user->home_address . '',
                'work_address' => $user->work_address . '',
            ],
            'token' => '' . $token,
        ];

        return $response;
    }

    public function loginWithGoogleFacebook($validated, $typeSocial)
    {
        // Check phone number
        $user = User::where('provider_name', $typeSocial)
            ->where('provider_id', $validated['provider_id'])->first();

        // Check password
        if (!$user) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'provider_id' => $validated['provider_id'],
                'provider_name' => $typeSocial,
            ]);
        }
        $token = $user->createToken('loginToken')->plainTextToken;

        $response = [
            'user' => [
                'user_id' => $user->user_id . '',
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

        return $response;
    }

    public function resetPassword($validated)
    {
        $user = User::where('phone_number', $validated['phone_number'])->first();
        // dd($user);
        if (!$user) {
            return response()->json([
                'data'=> false,
                'msg' => 'User does not exist',
            ], 401);
        } else {
            $user->password = $validated['password'];
            $user->save();
            return response()->json([
                'data'=> true,
                'msg' => 'Successfull'
            ], 200);
        }
    }

    public function loginWithZalo()
    {
    }
}
