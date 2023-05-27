<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Concert\Edit as ConcertEdit;
use App\Http\Livewire\Concert\Index as ConcertIndex;
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

Route::middleware('auth')
    ->prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');}
        )->name('admin-dashboard');

        Route::prefix('video')
            ->group(function () {
                Route::get('/', VideoIndex::class)->name('admin-videos');
                Route::get('/new', VideoEdit::class)->name('admin-video-new');
                Route::get('/edit/{video}', VideoEdit::class)->name('admin-video-edit');
            });

        Route::prefix('concert')
            ->group(function () {
                Route::get('/', ConcertIndex::class)->name('admin-concerts');
                Route::get('/new', ConcertEdit::class)->name('admin-concert-new');
                Route::get('/edit/{concert}', ConcertEdit::class)->name('admin-concert-edit');
            });
    });

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
