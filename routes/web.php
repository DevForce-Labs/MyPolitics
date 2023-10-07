<?php

use App\Http\Controllers\Data\{PoliticController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');













Route::get('/forum', [PoliticController::class, 'forum'])->name('forum.index');

Route::get('/suport', [PoliticController::class, 'suport'])->name('suport.index');


Route::get('/politics', [PoliticController::class, 'politics'])->name('politics.index');

Route::get('/politicsparties', [PoliticalPartyController::class, 'politicsparties'])->name('politicsparties.index');

Route::get('/', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
