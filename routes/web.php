<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\GenerateQrController;
use App\Http\Controllers\TestPusherController;
use App\Http\Controllers\ColorSchemeController;

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
    return to_route('login.index');
});

Route::get('/login', [MahasiswaController::class, 'loginView'])->name('login.index');
Route::post('/login', [MahasiswaController::class, 'login'])->name('login.check');
Route::get('/logout', [MahasiswaController::class, 'logout'])->name('logout.admin');
Route::get('/mahasiswa-absen',[MahasiswaController::class, 'absen'])->name('mahasiswa.absen');
Route::get('/mahasiswa-scan',[MahasiswaController::class, 'scan'])->name('mahasiswa.scan');
Route::post('/mahasiswa-submit',[MahasiswaController::class, 'absenProses'])->name('mahasiswa.submit');
Route::get('/login-admin', [AuthController::class, 'loginView'])->name('login-admin.index');
Route::post('/login-admin', [AuthController::class, 'login'])->name('login-admin.check');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/data', [ProfileController::class, 'getData'])->name('profile.data');
    Route::get('profile/turncate', [ProfileController::class, 'turncate'])->name('profile.turncate');
    Route::post('profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/show-data/{id}', [ProfileController::class, 'showData'])->name('profile.show-data');
    Route::get('profile/get-realtime-data', [ProfileController::class, 'getRealtimeData'])->name('profile.getRealtimeData');

    Route::get('qr', [GenerateQrController::class, 'index'])->name('qr.index');
    Route::get('generate', [GenerateQrController::class, 'generate'])->name('qr.generate');


    Route::get('profile/export', [ProfileController::class, 'export'])->name('profile.export');
    Route::post('profile/import', [ProfileController::class, 'import'])->name('profile.import');
});

// Route::get('login', [MahasiswaController::class, 'loginView'])->name('login.index');

// Route::get('/', [MahasiswaController::class, 'loginView'])->name('login.index');

// Route::get('/test', function () {
//     event(new App\Events\StatusLiked('Ari Padrian 1'));
//     return "Event has been sent!";
// });

// Route::get('/terima', function () {
//     return view('pages.a');
// });
