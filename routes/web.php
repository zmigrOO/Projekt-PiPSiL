<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return ((new OfferController)->showAll());
// })->name('offers');

Route::get('/', [OfferController::class, 'showAll'])->name('offers');
//route for offer details page - offer-layout.blade.php - offer/{id} - id is offer id in database - offer is offer controller - details is function in offer controller, it takes id as a parameter
Route::get('/offers/{id}', [OfferController::class, 'details'])->name('offer');





// Route::get('/offer/{id}', [OfferController::class, 'details({id})'])->name('offer');

// Route::get('/offer/{id}', function ($id) {
//     $offer = Offer::find($id);
//     return view('offer-layout', ['offer' => $offer]);
// })->name('offer');

Route::get('/my-offers', [OfferController::class, 'showMine'])->middleware(['auth', 'verified'])->name('my-offers');

Route::get('/new', [OfferController::class, 'new'])->middleware(['auth', 'verified'])->name('new');
Route::post('/submit-new', [OfferController::class, 'add'])->middleware(['auth', 'verified']);

Route::get('/watched', function () {
    return view('watched-offers');
})->middleware(['auth', 'verified'])->name('watched-offers');

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
