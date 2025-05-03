<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SimulationController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/data', [DataController::class, 'index'])->name('data.index');
Route::get('/simulation', [SimulationController::class, 'index'])->name('simulation.index');
Route::post('/simulation/run', [SimulationController::class, 'run'])->name('simulation.run');


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
