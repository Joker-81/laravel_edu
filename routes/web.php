<?php

use App\Http\Controllers\SchedulerTestController;
use Illuminate\Support\Facades\Route;

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

Route::get('index',[SchedulerTestController::class,'index']);
Route::get('new_row',[SchedulerTestController::class,'addRow']);
Route::get('del_row',[SchedulerTestController::class,'deleteRows']);

