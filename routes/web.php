<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // F1 Data resources
    Route::resource('circuits', CircuitController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('drivers', DriverController::class);
    
    Route::resource('races', RaceController::class);
    Route::resource('simulations', SimulationController::class);
    Route::resource('circuits', CircuitController::class);
    Route::view('/about', 'about')->name('about');

    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->middleware(['auth','verified'])
         ->name('dashboard');
    

});

require __DIR__.'/auth.php';