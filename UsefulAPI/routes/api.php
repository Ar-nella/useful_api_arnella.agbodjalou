<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\ModuleController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('/modules', [ModuleController::class, 'modules'])->middleware('auth:sanctum');

Route::post('/modules/{id}/activate', [ModuleController::class, 'activate'])->middleware('auth:sanctum');
Route::post('/modules/{id}/deactivate', [ModuleController::class, 'deactivate'])->middleware('auth:sanctum');



// Route::get('/home', function () {
//     return response('Hello World', 200)
//         ->header('Content-Type', 'text/plain');
// });


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


