<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiBasicAuth;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    //Recebe POST com credenciais para validar login e retorna true (com api_token) ou false
    Route::post('login', [LoginController::class, 'authenticate']);

    //Grupo de rotas que necessita api_token
    Route::group(['middleware' => [ApiBasicAuth::class]], function () {
        Route::get('/users', 'ApiController@users')->name('users');
    });
});