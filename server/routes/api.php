<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\ExpensesController;
use App\Models\Expenses;
use App\Http\Requests\createAuthRequest;


// USER ROUTES

Route::middleware('auth:sanctum')->get('/users', 'App\Http\Controllers\UserController@index');
Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\UserController@show');
// criar usuario sem middleware para testes mais faceis
Route::post('/user', 'App\Http\Controllers\UserController@store');


// EXPENSES ROUTES

Route::middleware('auth:sanctum')->post('/expenses', ExpensesController::class . '@store');
Route::middleware('auth:sanctum')->get('/expenses', ExpensesController::class . '@index');


// AUTH ROUTES

Route::get('/health', function () {
    return response('OK', 200);
});
Route::post('/login', function (createAuthRequest $request) {

    $validatedRequest = $request->validated();

    $user = User::where('email', $validatedRequest["email"])->first();

    if (! $user || ! Hash::check($validatedRequest["password"], $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken('token-name')->plainTextToken;
});
Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response('OK', 200);
});
