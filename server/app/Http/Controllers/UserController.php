<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\createUserRequest;

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

    public function store(createUserRequest $request)
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            return response()->json(['error' => 'Email already exists'], 400);
        }

        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function update(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->delete();

        return response()->json(null, 204);
    }
}
