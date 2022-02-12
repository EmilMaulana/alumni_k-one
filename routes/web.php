<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\MasterAdminController;

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

// Route::get('/', function () {
//     return view('layouts.main');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::put('/profile/edit', [ProfileController::class, 'update'])->middleware('auth');
Route::get('/dashboard/profile/edit', [ProfileController::class, 'edit'])->middleware('auth');

Route::post('/dashboard/profile/pekerjaan/create', [PekerjaanController::class, 'store'])->middleware('auth');
Route::delete('/dashboard/profile/pekerjaan/{pekerjaan:id}', [PekerjaanController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/post/create', [PostController::class, 'index'])->middleware('auth');
Route::post('/dashboard/post/create', [PostController::class, 'store'])->middleware('auth');
Route::get('/dashboard/{post:title}', [PostController::class, 'show'])->middleware('auth');
Route::delete('/dashboard/post/hapus/{post:id}', [PostController::class, 'destroy'])->middleware('auth');

Route::get('/master/admin/user/tampil', [MasterAdminController::class, 'tampil'])->middleware('admin');
Route::get('/master/admin/user/{search}/print', [MasterAdminController::class, 'print'])->middleware('admin');
Route::resource('/master/admin', MasterAdminController::class)->middleware('admin');
// Route::get('/dashboard/admin', [AdminController::class, 'index'])->middleware('auth');

Route::get('/master/admin/user/{user:nama}', [MasterAdminController::class, 'show'])->middleware('admin');
