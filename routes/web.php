<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OpinionController;
use App\Models\offer;
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

Route::get('/', [OfferController::class, 'showAll'])->name('offers');
Route::get('/search', [OfferController::class, 'search'])->name('offers');
//route for offer details page - offer-layout.blade.php - offer/{id} - id is offer id in database - offer is offer controller - details is function in offer controller, it takes id as a parameter
Route::get('/offers/{id}', [OfferController::class, 'details'])->name('offer');

Route::get('/my-offers', [OfferController::class, 'showMine'])->middleware(['auth', 'verified'])->name('my-offers');

Route::get('/new', [OfferController::class, 'new'])->middleware(['auth', 'verified'])->name('new');

Route::post('/submit-new', [OfferController::class, 'add'])->middleware(['auth', 'verified']);
Route::get('/edit/{id}', [OfferController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/edit/{id}', [OfferController::class, 'saveEdit'])->middleware(['auth', 'verified']);
Route::post('/opinion', [OpinionController::class, 'add'])->middleware(['auth', 'verified']);

Route::get('/watched', [OfferController::class, 'wishlist'])->middleware(['auth', 'verified'])->name('watched-offers');

Route::get('/watch/{id}', [OfferController::class, 'wishChange'])->middleware(['auth', 'verified']);
Route::get('/toggleActive/{id}', [OfferController::class, 'softDeleteToggle'])->middleware(['auth', 'verified']);
Route::get('/offer/delete/{id}', [OfferController::class, 'delete'])->middleware(['auth', 'verified']);

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('setlocale/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
require __DIR__ . '/auth.php';
