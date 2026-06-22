<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\PenerimaanDanaController;
use App\Http\Controllers\PengeluaranDanaController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes (protected)
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management Routes
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Pegawai Routes
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('admin.pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('admin.pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('admin.pegawai.store');
    Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('admin.pegawai.show');
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('admin.pegawai.edit');
    Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('admin.pegawai.update');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('admin.pegawai.destroy');

    // Biaya Routes
    Route::get('/biaya', [BiayaController::class, 'index'])->name('admin.biaya.index');
    Route::get('/biaya/create', [BiayaController::class, 'create'])->name('admin.biaya.create');
    Route::post('/biaya', [BiayaController::class, 'store'])->name('admin.biaya.store');
    Route::get('/biaya/{biaya}', [BiayaController::class, 'show'])->name('admin.biaya.show');
    Route::get('/biaya/{biaya}/edit', [BiayaController::class, 'edit'])->name('admin.biaya.edit');
    Route::put('/biaya/{biaya}', [BiayaController::class, 'update'])->name('admin.biaya.update');
    Route::delete('/biaya/{biaya}', [BiayaController::class, 'destroy'])->name('admin.biaya.destroy');

    // Customer Routes
    Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/customer/{customer}', [CustomerController::class, 'show'])->name('admin.customer.show');
    Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('admin.customer.update');
    Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');

    // Proyek Routes
    Route::get('/proyek', [ProyekController::class, 'index'])->name('admin.proyek.index');
    Route::get('/proyek/create', [ProyekController::class, 'create'])->name('admin.proyek.create');
    Route::post('/proyek', [ProyekController::class, 'store'])->name('admin.proyek.store');
    Route::get('/proyek/{proyek}', [ProyekController::class, 'show'])->name('admin.proyek.show');
    Route::get('/proyek/{proyek}/edit', [ProyekController::class, 'edit'])->name('admin.proyek.edit');
    Route::put('/proyek/{proyek}', [ProyekController::class, 'update'])->name('admin.proyek.update');
    Route::delete('/proyek/{proyek}', [ProyekController::class, 'destroy'])->name('admin.proyek.destroy');

    // Penerimaan Dana Routes
    Route::get('/penerimaan', [PenerimaanDanaController::class, 'index'])->name('admin.penerimaan.index');
    Route::get('/penerimaan/create', [PenerimaanDanaController::class, 'create'])->name('admin.penerimaan.create');
    Route::post('/penerimaan', [PenerimaanDanaController::class, 'store'])->name('admin.penerimaan.store');
    Route::get('/penerimaan/{penerimaan}', [PenerimaanDanaController::class, 'show'])->name('admin.penerimaan.show');
    Route::get('/penerimaan/{penerimaan}/edit', [PenerimaanDanaController::class, 'edit'])->name('admin.penerimaan.edit');
    Route::put('/penerimaan/{penerimaan}', [PenerimaanDanaController::class, 'update'])->name('admin.penerimaan.update');
    Route::delete('/penerimaan/{penerimaan}', [PenerimaanDanaController::class, 'destroy'])->name('admin.penerimaan.destroy');

    // Pengeluaran Dana Routes
    Route::get('/pengeluaran', [PengeluaranDanaController::class, 'index'])->name('admin.pengeluaran.index');
    Route::get('/pengeluaran/create', [PengeluaranDanaController::class, 'create'])->name('admin.pengeluaran.create');
    Route::post('/pengeluaran', [PengeluaranDanaController::class, 'store'])->name('admin.pengeluaran.store');
    Route::get('/pengeluaran/{pengeluaran}', [PengeluaranDanaController::class, 'show'])->name('admin.pengeluaran.show');
    Route::get('/pengeluaran/{pengeluaran}/edit', [PengeluaranDanaController::class, 'edit'])->name('admin.pengeluaran.edit');
    Route::put('/pengeluaran/{pengeluaran}', [PengeluaranDanaController::class, 'update'])->name('admin.pengeluaran.update');
    Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranDanaController::class, 'destroy'])->name('admin.pengeluaran.destroy');

    // Monitoring Routes
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('admin.monitoring.index');
    Route::get('/monitoring/create', [MonitoringController::class, 'create'])->name('admin.monitoring.create');
    Route::post('/monitoring', [MonitoringController::class, 'store'])->name('admin.monitoring.store');
    Route::get('/monitoring/{monitoring}', [MonitoringController::class, 'show'])->name('admin.monitoring.show');
    Route::get('/monitoring/{monitoring}/edit', [MonitoringController::class, 'edit'])->name('admin.monitoring.edit');
    Route::put('/monitoring/{monitoring}', [MonitoringController::class, 'update'])->name('admin.monitoring.update');
    Route::delete('/monitoring/{monitoring}', [MonitoringController::class, 'destroy'])->name('admin.monitoring.destroy');

    // Laporan Routes
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/laporan/export/pegawai', [LaporanController::class, 'exportPegawai'])->name('admin.laporan.exportPegawai');
    Route::get('/laporan/export/biaya', [LaporanController::class, 'exportBiaya'])->name('admin.laporan.exportBiaya');
    Route::get('/laporan/export/customer', [LaporanController::class, 'exportCustomer'])->name('admin.laporan.exportCustomer');
    Route::get('/laporan/export/proyek', [LaporanController::class, 'exportProyek'])->name('admin.laporan.exportProyek');
    Route::get('/laporan/export/penerimaan', [LaporanController::class, 'exportPenerimaan'])->name('admin.laporan.exportPenerimaan');
    Route::get('/laporan/export/pengeluaran', [LaporanController::class, 'exportPengeluaran'])->name('admin.laporan.exportPengeluaran');
    Route::get('/laporan/export/monitoring', [LaporanController::class, 'exportMonitoring'])->name('admin.laporan.exportMonitoring');
    Route::get('/laporan/export/users', [LaporanController::class, 'exportUsers'])->name('admin.laporan.exportUsers');
    Route::get('/laporan/export/jurnal-umum', [LaporanController::class, 'exportJurnalUmum'])->name('admin.laporan.exportJurnalUmum');
})->middleware('auth');
