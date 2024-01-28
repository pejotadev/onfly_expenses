<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\createUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\createAuthRequest;

class AuthController extends Controller
{
    public function register(createUserRequest $request)
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            return response()->json(['error' => 'Email already exists'], 400);
        }

        $user = User::create($data);

        return response()->json(new UserResource($user), 201);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request["email"])->first();

        if (! $user || ! Hash::check($request["password"], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            "token" => $user->createToken('auth_token')->plainTextToken
        ], 200);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
