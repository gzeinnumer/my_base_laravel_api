<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\API\PagingController;

//success
Route::post('/query_test',[PagingController::class, 'query_test']);
Route::get('/all',[PagingController::class, 'all']);
Route::get('/db',[PagingController::class, 'db']);
Route::get('/joinDB',[PagingController::class, 'joinDB']);
Route::get('/joinElo',[PagingController::class, 'joinElo']);
Route::get('/eloBelongTo',[PagingController::class, 'joinEloBelongTo']);

//failed
Route::get('/empty',[PagingController::class, 'empty']);
Route::get('/tc',[PagingController::class, 'tc']);

//paging
Route::get('/paging',[PagingController::class, 'paging']);


use App\Http\Controllers\API\DataController;
//crud
Route::post('/data/insert',[DataController::class, 'insert']);
Route::get('/data/find',[DataController::class, 'find']);
Route::get('/data/where',[DataController::class, 'where']);

// use App\Http\Controllers\API\PagingControllerZein;
// Route::prefix('paging')->group(function () {
//     Route::get('/paging', [, '']); //127.0.0.1:8000/api/paging/paging
// });
