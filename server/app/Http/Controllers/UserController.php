<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->expenses;

        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (User::where('email', $data['email'])->exists()) {
            return response()->json(['error' => 'Email already exists'], 400);
        }

        $user = User::create($data);

        return response()->json($user, 201);
    }
}
