<?php

namespace App\Http\Controllers;

use App\Models\GenerateQr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQrController extends Controller
{
    public function index()
    {
        $data = GenerateQr::orderBy('id', 'desc')->first();
        // $qrcode = QrCode::size(400)->generate($data->name);
        $qrcode = $data ? QrCode::size(400)->generate($data->name) : null;
        $tanggalFormatted = $data ? \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') :'tidak ada token tersedia, silahkan generate';


        return view('pages.qr.index', [
            'layout' => 'top-menu',
            'qrcode' => $qrcode,
            'tanggal' => $tanggalFormatted,
            'token' => $data ? $data->name :'tidak ada token tersedia, silahkan generate',
        ]);
    }

    public function generate()
    {
        //bikin random string alfanumerik untuk $data
        $data = Str::random(225);

        GenerateQr::create([
            'name' => $data
        ]);

        return to_route('qr.index');
    }
}
