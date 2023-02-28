<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Route::patch('projects/{project}/toggle', [AdminProjectController::class, 'toggle'])->name('projects.toggle');
        Route::get('trashed', [AdminProjectController::class, 'trashed'])->name('projects.trashed');
        Route::delete('projects/force-delete/{id}', [AdminProjectController::class, 'forceDelete'])->name('projects.forceDelete');
        Route::get('projects/restore/{id}', [AdminProjectController::class, 'restoreDeleted'])->name('projects.restore');

        Route::resource('/projects', AdminProjectController::class);
    });

require __DIR__ . '/auth.php';
