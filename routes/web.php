<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('login'); 
});

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('register');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login');

Route::get('/add',[FormController::class,'add'])->name('add');
Route::post('/add', [FormController::class,'addPost'])->name('add');

Route::get('/cari',[FormController::class,'cari'])->name('cari');
Route::post('/cari',[FormController::class,'caripost'])->name('cari');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/detail/{id}',[JobController::class,'detail'])->name('detail');
Route::post('/detail/{id}',[JobController::class,'complete'])->name('complete');

Route::get('/updatedetail/{id}',[JobController::class,'updatedetail'])->name('updatedetail');
Route::post('/updatedetail/{id}',[JobController::class,'update'])->name('update');

Route::get('/list',[JobController::class,'list'])->name('list');
Route::get('/joblist',[JobController::class,'joblist'])->name('joblist');

Route::get('/admin',[AuthController::class,'admin'])->name('admin');
Route::post('/admin',[AuthController::class,'adminpost'])->name('admin');
