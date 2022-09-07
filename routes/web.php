<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;

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
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('roles', [RolesController::class, 'index']);
    Route::get('create', [RolesController::class, 'create'])->name('admin.roles.store');
    Route::post('store', [RolesController::class, 'store']);
});

// Route::controller(DashboardController::class)->group(['prefix' => 'admin'],function(){
//     Route::get('/', 'index')->name('admin.dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
