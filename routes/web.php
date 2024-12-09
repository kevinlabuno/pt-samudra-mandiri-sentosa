<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KontainerController;
use App\Http\Controllers\KartonController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\KalengController;
use App\Http\Controllers\TenagaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('login');
});

Route::middleware('auth')->group(function () {
Route::get('beranda', [BerandaController::class , 'index'])->name('beranda');
Route::get('data', [DataController::class , 'index'])->name('data');

Route::get('transaction', function () {
    return view('transaction');
})->name('transactions');

Route::get('users', function () {
    return view('users');
})->name('users');
Route::get('setting', function () {
    return view('users');
})->name('setting');


Route::get('/kontainer', [KontainerController::class, 'index'])->name('kontainer.index');
Route::post('/kontainer', [KontainerController::class, 'store'])->name('kontainer.store');
Route::put('/kontainer/{id}', [KontainerController::class, 'update'])->name('kontainer.update');
Route::delete('/kontainer/{id}', [KontainerController::class, 'destroy'])->name('kontainer.destroy');

Route::get('/kartons', [KartonController::class, 'index'])->name('kartons.index');
Route::post('/kartons', [KartonController::class, 'store'])->name('kartons.store');
Route::delete('/kartons/{id}', [KartonController::class, 'destroy'])->name('kartons.destroy');
Route::put('/kartons/{id}', [KartonController::class, 'update'])->name('kartons.update');

Route::get('/kalengs', [KalengController::class, 'index'])->name('kalengs.index');
Route::post('/kalengs', [KalengController::class, 'store'])->name('kalengs.store');
Route::delete('/kalengs/{id}', [KalengController::class, 'destroy'])->name('kalengs.destroy');
Route::put('/kalengs/{id}', [KalengController::class, 'update'])->name('kalengs.update');

Route::get('/ikans', [IkanController::class, 'index'])->name('ikans');
Route::post('/ikans', [IkanController::class, 'store'])->name('ikans.store');
Route::delete('/ikans/{id}', [IkanController::class, 'destroy'])->name('ikans.destroy');
Route::put('/ikans/{id}', [IkanController::class, 'update'])->name('ikans.update');

Route::get('/tenagas', [TenagaController::class, 'index'])->name('tenagas.index');
Route::post('/tenagas', [TenagaController::class, 'store'])->name('tenagas.store');
Route::delete('/tenagas/{id}', [TenagaController::class, 'destroy'])->name('tenagas.destroy');
Route::put('/tenagas/{id}', [TenagaController::class, 'update'])->name('tenagas.update');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');

Route::get('/boms', [BomController::class, 'index'])->name('boms.index');
Route::post('/boms', [BomController::class, 'store'])->name('boms.store');
Route::delete('/boms/{id}', [BomController::class, 'destroy'])->name('boms.destroy');
Route::put('/boms/{id}', [BomController::class, 'update'])->name('boms.update');

Route::get('/mesins', [MesinController::class, 'index'])->name('mesins.index');
Route::post('/mesins', [MesinController::class, 'store'])->name('mesins.store');
Route::delete('/mesins/{id}', [MesinController::class, 'destroy'])->name('mesins.destroy');
Route::put('/mesins/{id}', [MesinController::class, 'update'])->name('mesins.update');

Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

Route::resource('users', UserController::class);

    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
