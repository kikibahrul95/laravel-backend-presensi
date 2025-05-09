<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi;

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
Route::group([
    'middleware' => 'auth'], function () {
        Route:: get('presensi', Presensi:: class)->name('presensi');
    });

Route::get('/login',function(){
 return redirect ('admin/login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});
