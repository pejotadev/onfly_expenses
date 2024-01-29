<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ExpensesController;

// AUTH ROUTES
// criar usuario sem middleware para testes mais faceis
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

// USER ROUTES
Route::middleware('auth:sanctum')
    ->apiResource('user', 'App\Http\Controllers\UserController')
    ->except(['destroy']);

Route::middleware('auth:sanctum')->delete('/user', 'App\Http\Controllers\UserController@destroy');

// EXPENSES ROUTES
Route::middleware('auth:sanctum')
    ->apiResource('expenses', 'App\Http\Controllers\ExpensesController');

// HEALTH CHECK ROUTE
Route::get('/health', function () {
    return response('OK', 200);
});
