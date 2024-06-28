<?php

use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\AbsensiGuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MatapelajaranController;
use GuzzleHttp\Middleware;

//use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});
// Make sure that we have get and post methods for Grocery CRUD to work as expected
Route::get('customers/{operation?}/{id?}', [CustomersController::class, 'datagrid']);
Route::post('customers/{operation?}/{id?}', [CustomersController::class, 'datagrid']);

Route::get('users/{operation?}/{id?}', [UsersController::class, 'datagrid'])->name('users')->Middleware('auth');
Route::post('users/{operation?}/{id?}', [UsersController::class, 'datagrid'])->name('users')->Middleware('auth');

Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('login-proses', [LoginController::class,'login_proses'])->name('login-proses');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::get('daftar/{operation?}/{id?}', [UsersController::class, 'registrasi'])->name('daftar');
Route::post('daftar/{operation?}/{id?}', [UsersController::class, 'registrasi'])->name('daftar');
// Route::get('mendaftar/{operation?}/{id?}', [UsersController::class, 'mendaftar'])->name('mendaftar');
Route::group(['profix' => 'admin','middleware' => ['auth'], 'as' => 'admin' ],function(){
    
});
Route::get('dashboard/{operation?}/{id?}', [DashboardController::class, 'dashboard'])->name('dashboard')->Middleware('auth');
Route::post('dashboard/{operation?}/{id?}', [DashboardController::class, 'dashboard'])->name('dashboard')->Middleware('auth');    

Route::get('manajemenmenu/{operation?}/{id?}', [CrudController::class, 'manajemenmenu'])->name('crudmenu')->Middleware('auth');
Route::post('manajemenmenu/{operation?}/{id?}', [CrudController::class, 'manajemenmenu'])->name('crudmenu')->Middleware('auth');

Route::get('manajemenaplikasi/{operation?}/{id?}', [CrudController::class, 'manajemenaplikasi'])->name('crudaplikasi')->Middleware('auth');
Route::post('manajemenaplikasi/{operation?}/{id?}', [CrudController::class, 'manajemenaplikasi'])->name('crudaplikasi')->Middleware('auth');

Route::get('siswa/{operation?}/{id?}', [SiswaController::class, 'kelolaSiswa'])->name('crudsiswa')->Middleware('auth');
Route::post('siswa/{operation?}/{id?}', [SiswaController::class, 'kelolaSiswa'])->name('crudsiswa')->Middleware('auth');

Route::get('kelas/{operation?}/{id?}', [KelasController::class, 'kelolaKelas'])->name('crudkelas')->Middleware('auth');
Route::post('kelas/{operation?}/{id?}', [KelasController::class, 'kelolaKelas'])->name('crudkelas')->Middleware('auth');

Route::get('jurusan/{operation?}/{id?}', [JurusanController::class, 'kelolaJurusan'])->name('crudjurusan')->Middleware('auth');
Route::post('jurusan/{operation?}/{id?}', [JurusanController::class, 'kelolaJurusan'])->name('crudjurusan')->Middleware('auth');

Route::get('guru/{operation?}/{id?}', [GuruController::class, 'kelolaGuru'])->name('crudguru')->Middleware('auth');
Route::post('guru/{operation?}/{id?}', [GuruController::class, 'kelolaGuru'])->name('crudguru')->Middleware('auth');

Route::get('matapelajaran/{operation?}/{id?}', [MatapelajaranController::class, 'kelolaMatapelajaran'])->name('crudmatapelajaran')->Middleware('auth');
Route::post('matapelajaran/{operation?}/{id?}', [MatapelajaranController::class, 'kelolaMatapelajaran'])->name('crudmatapelajaran')->Middleware('auth');

Route::get('absensiSiswa/{operation?}/{id?}', [AbsensiSiswaController::class, 'kelolaAbsensiSiswa'])->name('crudabsensisiswa')->Middleware('auth');
Route::post('absensiSiswa/{operation?}/{id?}', [AbsensiSiswaController::class, 'kelolaAbsensiSiswa'])->name('crudabsensisiswa')->Middleware('auth');

Route::get('absensiGuru/{operation?}/{id?}', [AbsensiGuruController::class, 'kelolaAbsensiGuru'])->name('crudabsensiguru')->Middleware('auth');
Route::post('absensiGuru/{operation?}/{id?}', [AbsensiGuruController::class, 'kelolaAbsensiGuru'])->name('crudabsensiguru')->Middleware('auth');
