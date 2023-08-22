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
        dd('absen');
        // /mahasiswa-absen
        // 11753101901
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
