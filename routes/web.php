<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemagrotradeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditTrailController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\LaporanDashboardController;
use App\Http\Controllers\NaziranController;
use App\Http\Controllers\PermitController;

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

Route::get('/', function () {
    return view('pagedepan');
});

Route::get('/layouts.base', function () {
    return view('layouts.base');
});


Route::resource('/sistemagrotrade', SistemagrotradeController::class);
//Route::resource('/admin', AdminController::class);
Route::resource('/audittrail', AuditTrailController::class);
Route::resource('/helpdesk', HelpdeskController::class);
Route::resource('/kelulusan', KelulusanController::class);
Route::resource('/laporandashboard', LaporanDashboardController::class);
Route::resource('/naziran', NaziranController::class);
Route::resource('/permit', PermitController::class);
Route::get('/kelulusan/create/{id}',[KelulusanController::class,'create']);

//Route::get('/sistemagrotrade/{id_sistemagrotrade}/edit-harga', [SistemagrotradeController::class, 'update_harga']);
//Route::post('/kereta/{id_kereta}/save-harga', [KeretaController::class, 'save_harga']);

Route::get('/dashboard', function () {
    return view('dashboard');







})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
