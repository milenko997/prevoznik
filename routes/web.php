<?php

use App\Http\Controllers\AdvertisementController;
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

Route::get('/', [AdvertisementController::class, 'publicIndex'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/advertisements', [AdvertisementController::class, 'publicIndex'])->name('advertisements.public');
    Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/advertisements', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/my-advertisements', [AdvertisementController::class, 'userIndex'])->name('advertisements.user');
    Route::get('/advertisements/edit/{slug}', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::put('/advertisements/{slug}/update', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('/advertisements/{id}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
});

Route::get('/advertisements/{slug}', [AdvertisementController::class, 'show'])->name('advertisements.show');

require __DIR__.'/auth.php';
