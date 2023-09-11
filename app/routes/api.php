<?php

use Illuminate\Http\Request;

use App\Http\Controllers\Api\TestOneController;
use App\Http\Controllers\Api\TestTwoController;
use App\Http\Controllers\Api\TestThreeController;
use App\Http\Controllers\Api\MiniProjectController;


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

Route::prefix('test')->group(function(){
    Route::post('one', [TestOneController::class, 'main'])->name('test.one.post');
    Route::post('two', [TestTwoController::class, 'main'])->name('test.two.post');
    Route::post('three', [TestThreeController::class, 'main'])->name('test.three.post');
});

Route::prefix('mini-project')->group(function() {
    Route::post('upload-file', [MiniProjectController::class, 'import']);
    Route::get('history', [MiniProjectController::class, 'history']);
    Route::get('product', [MiniProjectController::class, 'product']);
});