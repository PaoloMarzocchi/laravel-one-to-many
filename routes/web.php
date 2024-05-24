<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
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
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/types/projects-filtered/{type}', [TypeController::class, 'filtered'])->name('filtered');

        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'project:slug'
        ]);
        Route::resource('types', TypeController::class)->parameters([
            'types' => 'type:slug'
        ]);
    });

require __DIR__ . '/auth.php';

/* Route::get('/photos/popular', [PhotoController::class, 'popular']);
Route::resource('photos', PhotoController::class); */
