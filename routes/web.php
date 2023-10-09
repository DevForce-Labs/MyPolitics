<?php

use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Data\{PoliticController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

// SUPPORT
Route::get('/support',              [SupportController::class,          'index'])->name('support.index');
Route::get('/support/create',       [SupportController::class,          'create'])->name('support.create');
Route::get('/support/{id}',         [SupportController::class,          'show'])->name('support.show');
Route::get('/support/{id}/edit',    [SupportController::class,          'edit'])->name('support.edit');
Route::post('/support',             [SupportController::class,          'store'])->name('support.store');

// FORUM
Route::get('/forum',                [PoliticController::class,          'forum'])->name('forum.index');

// CONTACT
Route::get('/contact',              [SiteController::class,             'contact'])->name('site.contact');

// QUOTE
Route::get('/quote',                [QuoteController::class,            'index'])->name('quote.index');

// POLITICS
Route::get('/politics',             [PoliticController::class,          'politics'])->name('politics.index');

// POLITICS PARTIES
Route::get('/politicsparties',      [PoliticalPartyController::class,   'politicsparties'])->name('politicsparties.index');


// HOME
Route::get('/', function () {
    return view('Home');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// AUTHENTIC
Route::middleware('auth')->group(function () {
    Route::get('/profile',          [ProfileController::class,           'edit'])->name('profile.edit');
    Route::patch('/profile',        [ProfileController::class,           'update'])->name('profile.update');
    Route::delete('/profile',       [ProfileController::class,           'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';