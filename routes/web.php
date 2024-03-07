<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleManagementController;
use App\Http\Controllers\ScreenTestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserManagementController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/demo-redis', [DemoController::class, 'demoRedis']);

Route::get('/demo', [DemoController::class, 'demo']);
Route::post('/store-multi-data', [DemoController::class, 'storeMultipleData']);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/products', [ProductController::class, 'getData']);


Route::get('/role-management', [RoleManagementController::class, 'index'])->name('roleManagement');
Route::post('/role-management/save', [RoleManagementController::class, 'save'])->name('saveRolesPermissions');

Route::get('/user-management/create', [UserManagementController::class, 'create'])->name('user-management.create');
Route::post('/user-management/save', [UserManagementController::class, 'store'])->name('user-management.save');
Route::get('/screenA',  [ScreenTestController::class, 'testScreenA'])->middleware('checkPermission:1,2');