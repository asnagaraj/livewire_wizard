<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
  // password reset link send to mail 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


  // livewire  wizard view step by step
Route::get('wizard', function () {
    return view('default');
});
  // laravel livewire document read small examples
Route::get('/counter', Counter::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', [LoginController::class, 'logout']);


Auth::routes();

    // middleware
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// mutators and accessors
Route::controller(PostController::class)->group(function(){
    Route::get('post', 'create');
    Route::get('list', 'show');
});

//customer helpers

Route::get('call-helper', function(){

    $mdY = convertYmdToMdy('2022-02-12');
    var_dump("Converted into 'MDY': " . $mdY);
    
    $ymd = convertMdyToYmd('08-11-2022');
    var_dump("Converted into 'YMD': " . $ymd);
});

 // scout using package

 Route::get('users', [UserController::class, 'index']);

 // Squirephp country and state package
 Route::get('create',[UserController::class,'create']);
