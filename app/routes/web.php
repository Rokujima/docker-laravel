<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('test')->group(function(){
    Route::get('one', function () {
        return view('test.one');
    });
    Route::get('two', function () {
        return view('test.two');
    });
    Route::get('three', function () {
        return view('test.three');
    });
    Route::get('four', function () {
        return view('test.four');
    });
});

Route::prefix('mini-project')->group(function() {
    Route::get('', function() {
        return view('mini.index');
    });
    Route::get('history', function() {
        return view('mini.history');
    });
});