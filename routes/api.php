<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\UsersController;
use \App\Http\Controllers\API\SkillsController;
use \App\Http\Controllers\API\UsersSkillsController;
use \App\Http\Controllers\API\UsersVacationsController;
use \App\Http\Controllers\API\DepartmentsController;
use \App\Http\Controllers\API\DepartmentsUsersController;
use \App\Http\Controllers\API\DepartmentsManagersController;


// namespace App\Http\Controllers\API;
// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

 Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
 });

 //Route::get('/user', [UsersController::class, 'index']);
 //Route::get('/users/{id}', [UsersController::class, 'show']);
 //Route::apiResource('/users', UsersController::class, ['only' => 'index']);
 //Route::apiResource('/users', UsersController::class, ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
 Route::apiResource('/users', UsersController::class);
 //Route::get('/skills', [SkillsController::class, 'index']);
 Route::apiResource('/skills', SkillsController::class);//, ['only' => ['index','store']]);
 //Route::get('/users/{id}/skills', [UsersSkillsController::class, 'index']);
 Route::apiResource('/users/{id}/skills', UsersSkillsController::class, ['only' => ['index']]);
 Route::apiResource('users.skills', UsersSkillsController::class, ['only' => ['index', 'store']]);
 Route::apiResource('/vacations', UsersVacationsController::class);
 Route::apiResource('users.vacations', UsersVacationsController::class); 

 Route::apiResource('departments', DepartmentsController::class);
 Route::apiResource('departments.users', DepartmentsUsersController::class, ['only' => ['update', 'destroy']]);
 Route::apiResource('departments.managers', ManagersDepartmentsController::class, ['only' => ['update', 'destroy']]);


