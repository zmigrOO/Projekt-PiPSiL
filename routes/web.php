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

Route::get('/my-offers', [OfferController::class, 'showMine'])->middleware(['auth', 'verified'])->name('my-offers');

Route::get('/new', function(){
    return view('new-offer');
})->middleware(['auth', 'verified'])->name('new');

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
