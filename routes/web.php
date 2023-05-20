<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Video\Edit as VideoEdit;
use App\Http\Livewire\Video\Index as VideoIndex;
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

Route::get('/', 'App\Http\Controllers\Index@index');

Route::prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');}
        )->name('admin-dashboard');

        Route::get('/video/new', VideoEdit::class
        )->name('admin-video-new');

        Route::get('/video/edit/{video}', VideoEdit::class
        )->name('admin-video-edit');

        Route::get('/videos', VideoIndex::class
        )->name('admin-videos');
    })
    ->middleware(['auth', 'verified']);

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
