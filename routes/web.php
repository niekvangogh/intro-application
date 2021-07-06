<?php

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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Login Azure
Route::get('/', [App\Http\Controllers\AuthController::class, 'SignIn']);
Route::get('/callback', [App\Http\Controllers\AuthController::class, 'Callback']);
Route::get('/signout', [App\Http\Controllers\AuthController::class, 'SignOut']);

//AzureAuth group
Route::middleware(['AzureAuth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'Index']);
});
