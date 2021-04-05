<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AktifitasController;
use App\Http\Controllers\LowonganController;



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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);

//Route::middleware(['jwt_verify'])->group(function(){
    Route::group(['prefix'=>'/profile'], function(){
        Route::get('/{user_id}', [ProfileController::class, 'index']);
    });

    Route::group(['prefix'=>'/aktifitas'], function(){
        Route::post('', [AktifitasController::class, 'store']);
        Route::get('', [AktifitasController::class, 'all']);
        Route::get('/{user_id}', [AktifitasController::class, 'index']);
    });

    Route::group(['prefix'=>'/lowongan'],function(){
        Route::post('', [LowonganController::class, 'store']);
        Route::post('/lamar', [LowonganController::class, 'lamar']);
        Route::get('', [LowonganController::class, 'all']);
        Route::get('/{user_id}', [LowonganController::class, 'index']);
    });
//});