<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\FacultyMajorsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('faculties', FacultyController::class);

        // Faculty Majors
        Route::get('/faculties/{faculty}/majors', [
            FacultyMajorsController::class,
            'index',
        ])->name('faculties.majors.index');
        Route::post('/faculties/{faculty}/majors', [
            FacultyMajorsController::class,
            'store',
        ])->name('faculties.majors.store');

        Route::apiResource('majors', MajorController::class);

        Route::apiResource('users', UserController::class);
    });
