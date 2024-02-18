<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Profile;
use App\Models\GenerateQr;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class MahasiswaController extends Controller
{
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'base',
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

    public function absen(Request $request) {
        $alert = $request->input('alert');
        // get data asben by id_pd & created_at = now
        $date_time = date('Y-m-d');

        //ambil id_pd dari cookies
        // $id_pd = $_COOKIE['id_pd'];
        $id_pd = $request->cookie('id_pd');

        // dd($id_pd);

        $absen = Absen::where('id_pd', $id_pd)->whereDate('created_at', $date_time)->first();

        // dd($absen);
        //jika ada data absen, maka tampilkan jam absen
        if ($absen) {
            //tampilkan created_at dengan format waktu absen menjadi 08:00:00 dari created_at = 2021-09-01 08:00:00
            $jam = $absen->created_at = date('H:i:s', strtotime($absen->created_at));
            return view('pages.absen.index', [
                'layout' => 'top-menu',
                'alert' => $alert ? $alert : 'Selamat datang di aplikasi absensi wisuda, Silahkan lakukan scan barcode untuk merekam absensi.',
                'jam' => $jam
            ]);
        } else {
            //jika tidak ada data absen, maka tampilkan jam = belum ada data
            return view('pages.absen.index', [
                'layout' => 'no-menu',
                'alert' => $alert ? $alert : 'Selamat datang di aplikasi absensi wisuda, Silahkan lakukan scan barcode untuk merekam absensi.',
                'jam' => 'belum ada data'
            ]);
        }
    }

    public function scan(Request $request) {
        $alert = $request->input('alert');
        return view('pages.absen.scan-2',[
            'alert' => $alert ? $alert : null,
        ]);
    }

    // proses absen dari scanqr
    public function absenProses(Request $request) {
        try {
            $data = $request->all();

            //get data generate qr latest (terbaru)
            $generateQr = GenerateQr::orderBy('id', 'desc')->first();

            //cocokkan data generate qr dengan data yang diinputkan
            if ($generateQr->name != $data['token']) {
                return redirect()->route('mahasiswa.scan', [
                    'alert' => 'QR Tidak Valid'
                ]);
            }

            //cek apakah sudah absen hari ini
            $date_time = date('Y-m-d H:i:s'); //2023-08-24 18:49:54
            $absen = Absen::where('id_pd', $data['id_pd'])
            ->where('created_at', $date_time)
            ->orderBy('id', 'desc')
            ->first();

            // dd($absen);
            if ($absen) {
                return redirect()->route('mahasiswa.scan', [
                    'alert' => 'Anda sudah absen hari ini'
                ]);
            }

            //simpan data absen
            $absen = new Absen();
            $absen->id_pd = $data['id_pd'];
            $absen->save();

            //update kolom hadir tabel profile menjadi 1
            $profile = Profile::where('nim', $data['id_pd'])->first();
            if ($profile) {
                $profile->hadir = 1;
                $profile->save();
            } else {
                return redirect()->route('mahasiswa.absen', [
                    'alert' => 'Anda tidak terdaftar sebagai wisudawan periode ini'
                ]);
            }

            return redirect()->route('mahasiswa.absen', [
                    'alert' => 'Berhasil absen, terima kasih'
                ]);
        } catch (\Exception $e) {
            // Tangani error di sini, misalnya:
            // Log::error($e->getMessage());
            return redirect()->route('mahasiswa.scan', [
                    'alert' => $e->getMessage()
                ]);
        }
    }

    public function absenProsesByAdmin(Request $request) {
        //proses absen return json
        try {
            $data = $request->all();

            //simpan data absen
            $absen = new Absen();
            $absen->id_pd = $data['id_pd'];
            $absen->save();

            //update kolom hadir tabel profile menjadi 1
            $profile = Profile::where('nim', $data['id_pd'])->first();
            if ($profile) {
                $profile->hadir = 1;
                $profile->save();
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak terdaftar sebagai wisudawan periode ini'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil absen, terima kasih'
            ]);
        } catch (\Exception $e) {
            // Tangani error di sini, misalnya:
            // Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
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
