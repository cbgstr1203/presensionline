<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PresensioutController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CalenderController;




Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })-> name('login');
    Route::post('/proseslogin',[AuthController::class,'proseslogin']);
   

});

Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })-> name('loginadmin');
    Route::post('/prosesloginadmin',[AuthController::class,'prosesloginadmin']);
   

});


Route::middleware(['auth:karyawan'])->group(function () {
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/calender',[CalenderController::class,'index']);
Route::get('/proseslogout',[AuthController::class,'proseslogout']);
Route::get('/createout',[PresensioutController::class,'createout']);   
Route::get('/create',[PresensiController::class,'create']);
Route::get('pic',[PresensiController::class,'action'])->name('create.action');
Route::post('presensi/store',[PresensiController::class,'store'] );
Route::post('presensi/storee',[PresensioutController::class,'storee'] );
Route::get('lokasiout',[PresensioutController::class,'action'])->name('create.action');
Route::get('/scanner',[ScannerController::class,'scanner']);   
Route::get('/addlokasi',[LokasiController::class,'addlokasi']);
Route::post('/addlokasi/store',[LokasiController::class,'store']);
Route::get('/profil',[KaryawanController::class,'profil']);
Route::post('/karyawan/{nik}/updateprofil',[KaryawanController::class,'updateprofil']);
Route::get('/addlokasi/action',[LokasiController::class,'action'])->name('addlokasi.action');

});

Route::middleware(['auth:user'])->group(function () {
Route::get('/panel/dashboardadmin',[DashboardController::class,'dashboardadmin']);
Route::get('/panel/proseslogoutadmin',[AuthController::class,'proseslogoutadmin']);
Route::get('/panel/karyawan',[KaryawanController::class,'index']);
Route::get('/panel/user',[UsersController::class,'index']);
Route::get('/panel/lokasi',[LokasiController::class,'lokasi']);
Route::post('/lokasi/edit',[LokasiController::class,'edit']);
Route::post('/lokasi/{lokasi_id}/update',[LokasiController::class,'update']);
Route::delete('/lokasi/{lokasi_id}/delete',[LokasiController::class,'delete']);
Route::get('/panel/laporan',[ReportController::class,'laporan']);
Route::get('/panel/laporandept',[ReportController::class,'laporandept']);
Route::post('/lokasi/store',[LokasiController::class,'store']);

Route::get('/panel/departemen',[DeptController::class,'index']);
Route::get('/panel/monitoring',[DashboardController::class,'monitoring']);
Route::post('/departemen/store',[DeptController::class,'store']);
Route::post('/departemen/edit',[DeptController::class,'edit']);
Route::post('/departemen/{dept_kode}/update',[DeptController::class,'update']);
Route::delete('/departemen/{dept_kode}/delete',[DeptController::class,'delete']);
Route::post('/getpresensi',[DashboardController::class,'getpresensi']);
Route::post('/report/cetaklaporan',[ReportController::class,'cetaklaporan']);
Route::post('/report/cetaklaporandept',[ReportController::class,'cetaklaporandept']);
//Route::post('/addlokasi/store',[LokasiController::class,'store']);
Route::post('/karyawan/store',[KaryawanController::class,'store']);
Route::post('/karyawan/edit',[KaryawanController::class,'edit']);
Route::post('/karyawan/{nik}/update',[KaryawanController::class,'update']);

Route::post('/user/store',[UsersController::class,'store']);
Route::get('/search', [DashboardController::class, 'search'])->name('search');


});