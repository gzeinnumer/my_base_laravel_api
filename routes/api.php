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
Route::get('/allSimple',[PagingController::class, 'allSimple']);

Route::get('/db',[PagingController::class, 'db']);
Route::get('/dbSimple',[PagingController::class, 'dbSimple']);

Route::get('/joinDB',[PagingController::class, 'joinDB']);
Route::get('/joinDBSimple',[PagingController::class, 'joinDBSimple']);

Route::get('/joinElo',[PagingController::class, 'joinElo']);
Route::get('/joinEloSimple',[PagingController::class, 'joinEloSimple']);

Route::get('/eloBelongTo',[PagingController::class, 'joinEloBelongTo']);
Route::get('/eloBelongToSimple',[PagingController::class, 'joinEloBelongToSimple']);

//failed
Route::get('/empty',[PagingController::class, 'empty']);
Route::get('/emptySimple',[PagingController::class, 'emptySimple']);

Route::get('/tc',[PagingController::class, 'tc']);

//paging
Route::get('/paging',[PagingController::class, 'paging']);
Route::get('/pagingSimple',[PagingController::class, 'pagingSimple']);


use App\Http\Controllers\API\DataController;
//crud
Route::post('/data/insert',[DataController::class, 'insert']);

Route::get('/data/find',[DataController::class, 'find']);
Route::get('/data/findSimple',[DataController::class, 'findSimple']);

Route::get('/data/where',[DataController::class, 'where']);
Route::get('/data/whereSimple',[DataController::class, 'whereSimple']);

// use App\Http\Controllers\API\PagingControllerZein;
// Route::prefix('paging')->group(function () {
//     Route::get('/paging', [, '']); //127.0.0.1:8000/api/paging/paging
// });

use App\Http\Controllers\API\BarangController;

Route::prefix('barang')->group(function () {
    Route::post('/insert', [BarangController::class, 'insert'])->name('barang.insert');
    Route::get('/all', [BarangController::class, 'all'])->name('barang.all');
    Route::post('/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::get('/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');
    Route::get('/find/{id}', [BarangController::class, 'find'])->name('barang.find');
});