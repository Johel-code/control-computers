<?php

use App\Http\Controllers\TestRedis;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('computer-redis', [TestRedis::class, 'index'] );
Route::get('computer', [TestRedis::class, 'getComputer'] );

Route::get('/redis', function(){
    $redis = Redis::incr('p');
    return $redis;
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/welcome', function () {
        return view('welcome');
    });
    Route::view('/docentes','index-docentes')->name('docentes');
    Route::view('/estudiantes','index-estudiantes')->name('estudiantes');
    Route::view('/','index-asignaciones')->name('asignaciones');
});
