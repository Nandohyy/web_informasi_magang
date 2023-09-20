<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/search', [HomeController::class, 'search'])->name('search');
Route::post('/home', [HomeController::class, 'store'])->name('regist');
Route::get('/home/{id}', [HomeController::class, 'show'])->name('detail');

Route::prefix('admin')->group(function () {
    Route::get('/loker/tambah', [AdminViewController::class, 'tambahDataView'])->name('admin.view.tambah_data');
    Route::get('/', [AdminViewController::class, 'dashboard'])->name('admin.view.dashboard');
    Route::get('/loker', [AdminViewController::class, 'dataMagang'])->name('admin.view.data');
    Route::get('/peserta', [AdminViewController::class, 'dataPeserta'])->name('admin.view.peserta');
    Route::get('/detail-admin/{id}', [AdminViewController::class, 'detailAdmin'])->name('admin.view.detail');
    Route::get('/loker/edit/{id}', [AdminViewController::class, 'editDataView'])->name('admin.view.edit_data');

    Route::post('/loker/tambah/data', [AdminController::class, 'tambahDataMagang'])->name('admin.tambah_data');
    Route::put('/loker/edit/data/{id}', [AdminController::class, 'editDataMagang'])->name('admin.edit_data');
    Route::get('/peserta/search', [AdminController::class, 'searchPendaftar'])->name('admin.search_peserta');

    Route::delete('/loker/{id}', [AdminController::class, 'deleteLoker'])->name('admin.delete_data');
});
