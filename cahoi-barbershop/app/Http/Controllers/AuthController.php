<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRegister $request)
    {
        $faker = Factory::create();
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create([
            'password' =>  $validated['password'],
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $faker->email(),
            'birthday' => $faker->date(),
            'home_address' => $faker->address(),
            'work_address' => $faker->address(),
            'rank_member_id' => '1',
        ]);

        $token = $user->createToken('lequangtho')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'msg' => 'successful',
        ], 200);
    }

    public function login(UserLogin $request)
    {
        $validated = $request->validated();

        // Check email
        $user = User::where('phone_number', $validated['phone_number'])->first();

        // Check password
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        $token = $user->createToken('lequangtho')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });

        return [
            'message' => 'Logged out'
        ];
    }
}
