<?php

use App\Http\Controllers\AccountSettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\SkkniController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\daftar_asesor_controller;
use App\Http\Controllers\EkosistemLsptaController;
use App\Http\Controllers\KalenderKegiatanController;
use App\Http\Controllers\SkemaSertifikasiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\tempat_uji_kompeten_controller;
use App\Http\Controllers\AlurUjiDanSkemaSertifikasiController;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\RegistrasiUserController;

// Route::get('/', [ProfileController::class, 'header'])->name('header');

Route::get('/dashboards', [AdminDashboard::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Make sure that we have get and post methods for Grocery CRUD to work as expected
    Route::get('customers/{operation?}/{id?}', [CustomersController::class, 'datagrid']);
    Route::post('customers/{operation?}/{id?}', [CustomersController::class, 'datagrid']);

    // HOME
    Route::get('header/{operation?}/{id?}', [HeaderController::class, 'topLandingPage']);
    Route::post('header/{operation?}/{id?}', [HeaderController::class, 'topLandingPage']);

    Route::get('banner/{operation?}/{id?}', [HomeController::class, 'banner']);
    Route::post('banner/{operation?}/{id?}', [HomeController::class, 'banner']);

    Route::get('partners/{operation?}/{id?}', [HomeController::class, 'partners']);
    Route::post('partners/{operation?}/{id?}', [HomeController::class, 'partners']);

    Route::get('berita/{operation?}/{id?}', [HomeController::class, 'berita']);
    Route::post('berita/{operation?}/{id?}', [HomeController::class, 'berita']);

    Route::get('berita_card/{operation?}/{id?}', [HomeController::class, 'berita_card']);
    Route::post('berita_card/{operation?}/{id?}', [HomeController::class, 'berita_card']);

    Route::get('pengumuman/{operation?}/{id?}', [HomeController::class, 'pengumuman']);
    Route::post('pengumuman/{operation?}/{id?}', [HomeController::class, 'pengumuman']);

    Route::get('list_pengumuman/{operation?}/{id?}', [HomeController::class, 'list_pengumuman']);
    Route::post('list_pengumuman/{operation?}/{id?}', [HomeController::class, 'list_pengumuman']);

    // Profile
    Route::get('sambutan_header/{operation?}/{id?}', [SambutanController::class, 'sambutan_header']);
    Route::post('sambutan_header/{operation?}/{id?}', [SambutanController::class, 'sambutan_header']);

    Route::get('sambutan_content/{operation?}/{id?}', [SambutanController::class, 'sambutan_content']);
    Route::post('sambutan_content/{operation?}/{id?}', [SambutanController::class, 'sambutan_content']);

    Route::get('about_header/{operation?}/{id?}', [TentangKamiController::class, 'about_header']);
    Route::post('about_header/{operation?}/{id?}', [TentangKamiController::class, 'about_header']);

    Route::get('about_content/{operation?}/{id?}', [TentangKamiController::class, 'about_content']);
    Route::post('about_content/{operation?}/{id?}', [TentangKamiController::class, 'about_content']);

    Route::get('visi_content/{operation?}/{id?}', [VisiMisiController::class, 'visi_content']);
    Route::post('visi_content/{operation?}/{id?}', [VisiMisiController::class, 'visi_content']);

    Route::get('struktur-organisasi-header/{operation?}/{id?}', [StrukturOrganisasiController::class, 'strukturOrganisasiHeader']);
    Route::post('struktur-organisasi-header/{operation?}/{id?}', [StrukturOrganisasiController::class, 'strukturOrganisasiHeader']);

    Route::get('struktur-organisasi/{operation?}/{id?}', [StrukturOrganisasiController::class, 'datagrid']);
    Route::post('struktur-organisasi/{operation?}/{id?}', [StrukturOrganisasiController::class, 'datagrid']);

    Route::get('ekosistem-lsp-header/{operation?}/{id?}', [EkosistemLsptaController::class, 'ekosistemLspHeader']);
    Route::post('ekosistem-lsp-header/{operation?}/{id?}', [EkosistemLsptaController::class, 'ekosistemLspHeader']);

    Route::get('ekosistem-lspta/{operation?}/{id?}', [EkosistemLsptaController::class, 'datagrid']);
    Route::post('ekosistem-lspta/{operation?}/{id?}', [EkosistemLsptaController::class, 'datagrid']);

    // SERTIFIKASI CRUD
    Route::get('alur-uji-dan-skema-sertifikasi-header/{operation?}/{id?}', [AlurUjiDanSkemaSertifikasiController::class, 'alurUjiHeader']);
    Route::post('alur-uji-dan-skema-sertifikasi-header/{operation?}/{id?}', [AlurUjiDanSkemaSertifikasiController::class, 'alurUjiHeader']);

    Route::get('alur-uji-dan-skema-sertifikasi/{operation?}/{id?}', [AlurUjiDanSkemaSertifikasiController::class, 'datagrid']);
    Route::post('alur-uji-dan-skema-sertifikasi/{operation?}/{id?}', [AlurUjiDanSkemaSertifikasiController::class, 'datagrid']);

    Route::get('skkni-header/{operation?}/{id?}', [SkkniController::class, 'skkniHeader']);
    Route::post('skkni-header/{operation?}/{id?}', [SkkniController::class, 'skkniHeader']);

    Route::get('skkni/{operation?}/{id?}', [SkkniController::class, 'datagrid']);
    Route::post('skkni/{operation?}/{id?}', [SkkniController::class, 'datagrid']);

    Route::get('skema-sertifikasi/{operation?}/{id?}', [SkemaSertifikasiController::class, 'topLandingPage']);
    Route::post('skema-sertifikasi/{operation?}/{id?}', [SkemaSertifikasiController::class, 'topLandingPage']);

    Route::get('skema-sertifikasi-modal/{operation?}/{id?}', [SkemaSertifikasiController::class, 'modalLandingPage']);
    Route::post('skema-sertifikasi-modal/{operation?}/{id?}', [SkemaSertifikasiController::class, 'modalLandingPage']);

    Route::get('tempat-uji-kompetensi-header/{operation?}/{id?}', [tempat_uji_kompeten_controller::class, 'topLandingPage']);
    Route::post('tempat-uji-kompetensi-header/{operation?}/{id?}', [tempat_uji_kompeten_controller::class, 'topLandingPage']);

    Route::get('tabel-tempat-uji-kompetensi/{operation?}/{id?}', [tempat_uji_kompeten_controller::class, 'tableLandingPage']);
    Route::post('tabel-tempat-uji-kompetensi/{operation?}/{id?}', [tempat_uji_kompeten_controller::class, 'tableLandingPage']);

    Route::get('daftar-asesor-header/{operation?}/{id?}', [daftar_asesor_controller::class, 'topLandingPage']);
    Route::post('daftar-asesor-header/{operation?}/{id?}', [daftar_asesor_controller::class, 'topLandingPage']);

    Route::get('tabel-daftar-asesor/{operation?}/{id?}', [daftar_asesor_controller::class, 'tableLandingPage']);
    Route::post('tabel-daftar-asesor/{operation?}/{id?}', [daftar_asesor_controller::class, 'tableLandingPage']);

    // INFORMASI
    Route::get('berita-header/{operation?}/{id?}', [BeritaController::class, 'beritaHeader']);
    Route::post('berita-header/{operation?}/{id?}', [BeritaController::class, 'beritaHeader']);

    Route::get('berita/{operation?}/{id?}', [BeritaController::class, 'datagrid']);
    Route::post('berita/{operation?}/{id?}', [BeritaController::class, 'datagrid']);

    Route::get('bulan/{operation?}/{id?}', [BulanController::class, 'datagrid']);
    Route::post('bulan/{operation?}/{id?}', [BulanController::class, 'datagrid']);

    Route::get('kalender-kegiatan-header/{operation?}/{id?}', [KalenderKegiatanController::class, 'kalenderKegiatanHeader']);
    Route::post('kalender-kegiatan-header/{operation?}/{id?}', [KalenderKegiatanController::class, 'kalenderKegiatanHeader']);

    Route::get('kalender-kegiatan/{operation?}/{id?}', [KalenderKegiatanController::class, 'datagrid']);
    Route::post('kalender-kegiatan/{operation?}/{id?}', [KalenderKegiatanController::class, 'datagrid']);


});

// Landings Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// PROFILE
Route::get('/profil/sambutan-direktur', [SambutanController::class, 'index'])->name('/profil/sambutan-direktur');
Route::get('/profil/tentang-lsp', [TentangKamiController::class, 'index'])->name('/profil/tentang-lsp');
Route::get('/profil/visi-misi', [VisiMisiController::class, 'index']);
Route::get('/profil/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi');
Route::get('/profil/ekosistem-lspta', [EkosistemLsptaController::class, 'index'])->name('ekosistem-lspta');

// SERTIFIKASI
Route::get('/sertifikasi/alur-uji-dan-skema-sertifikasi', [AlurUjiDanSkemaSertifikasiController::class, 'index'])->name('alur-uji-dan-skema-notifikasi');
Route::get('/sertifikasi/skkni', [SkkniController::class, 'index'])->name('skkni');
Route::get('/sertifikasi/skema-sertifikasi', [SkemaSertifikasiController::class, 'index'])->name('Skema Sertifikasi');
Route::get('/sertifikasi/tempat-uji-kompetensi', [tempat_uji_kompeten_controller::class, 'index'])->name('Tempat Uji Komptensi');
Route::post('/sertifikasi/tempat-uji-kompetensi', [tempat_uji_kompeten_controller::class, 'index'])->name('Tempat Uji Komptensi');
Route::get('/sertifikasi/daftar-asesor', [daftar_asesor_controller::class, 'index'])->name('Daftar Asesor');

// INFORMASI
Route::get('/informasi/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/informasi/berita/{berita:id}', [BeritaController::class, 'singleBerita'])->name('single-berita');
Route::get('/informasi/kalender-kegiatan', [KalenderKegiatanController::class, 'index'])->name('kalender-kegiatan');
Route::get('/informasi/faq', function () {
    return view('landing-page.informasi.faq');
});

// FORMULIR
Route::get('/registrasi', [RegistrasiUserController::class, 'create'])->name('registrasi.create');
Route::post('/registrasi', [RegistrasiUserController::class, 'store'])->name('registrasi.store');
Route::get('/registrasi/{provinsiId}', [RegistrasiUserController::class, 'getKabupaten']);
Route::get('/regist/verify', [AccountSettingsController::class, 'index'])->name('verify');


Route::get('/login', function () {
    return view('landing-page.akun.login');
});

Route::get('/grafik', function () {
    return view('landing-page.layouts.grafik');
});

Route::get('/informasi/forget-password', function () {
    return view('landing-page.akun.forget-password');
});


require __DIR__ . '/auth.php';
