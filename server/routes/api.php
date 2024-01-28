<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ExpensesController;

// criar usuario sem middleware para testes mais faceis
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

// USER ROUTES


Route::middleware('auth:sanctum')->delete('/user', 'App\Http\Controllers\UserController@destroy');
Route::middleware('auth:sanctum')->get('/users', 'App\Http\Controllers\UserController@index');
Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\UserController@show');



// EXPENSES ROUTES

Route::middleware('auth:sanctum')->post('/expenses', ExpensesController::class . '@store');
Route::middleware('auth:sanctum')->get('/expenses', ExpensesController::class . '@index');


// AUTH ROUTES

Route::get('/health', function () {
    return response('OK', 200);
});


Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response('OK', 200);
});
