<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('check',[CheckController::class, 'check'])->name('check');
#start admin login
Route::get('/',[LoginController::class, 'index'])->name('alogin');
Route::post('loginAction',[LoginController::class, 'loginAction'])->name('loginAction');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::get('register',[LoginController::class, 'registerIndex'])->name('register');
Route::post('registrationAction',[LoginController::class, 'registrationAction'])->name('registrationAction');
Route::get('dashboard',[LoginController::class, 'dashboard'])->name('dashboard');
#end admin login
#start blog
Route::get('blog-post-list',[BlogController::class, 'index']);
Route::get('blog-add/{edit_id}',[BlogController::class, 'addEdit']);
Route::get('blog-delete/{id}',[BlogController::class, 'deletePost']);
Route::get('blog-add',[BlogController::class, 'addEdit']);
Route::post('blog-add-action',[BlogController::class, 'addEditAction']);
#end blog

