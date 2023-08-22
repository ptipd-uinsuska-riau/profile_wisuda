<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class MahasiswaController extends Controller
{
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'base'
        ]);
    }

    public function login(LoginRequest $request): void
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }

    public function absen() {
        return view('pages.absen.index', [
            'layout' => 'top-menu'
        ]);
    }

    // proses absen dari scanqr
    public function absenProses(Request $request) {
        $data = $request->all();
        $data['mahasiswa_id'] = Auth::user()->id;
        $data['status'] = 'hadir';
        $data['tanggal'] = date('Y-m-d');
        $data['waktu'] = date('H:i:s');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Absen::create($data);
        return redirect()->route('mahasiswa.absen')->withSuccess('Absen berhasil');
    }

    // Controller di sisi server (backend)
    public function logout(Request $request)
    {
        // Opsional: Hapus semua data sesi
        $request->session()->flush();

        // Alihkan pengguna ke halaman login atau halaman lain yang sesuai
        return redirect()->route('login.index')->withSuccess('You have successfully logged out.');
    }
}
