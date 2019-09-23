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
    return view('main');
});

Route::get('room/part1', 'RoomController@part1');
Route::post('room/part1_add', 'RoomController@part1_add');

Route::get('room/part2', 'RoomController@part2');
Route::post('room/part2', 'RoomController@part2');
