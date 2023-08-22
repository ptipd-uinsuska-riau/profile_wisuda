<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQrController extends Controller
{
    public function index()
    {
        // Data teks yang ingin diubah menjadi kode QR
        $textData = "Ini adalah teks yang akan diubah menjadi kode QR.";

        // Generate kode QR dan simpan ke dalam gambar
        $qrCodeImagePath = public_path('images/qrcode.png');
        QrCode::format('png')->size(300)->generate($textData, $qrCodeImagePath);

        // Tampilkan view dan kirimkan path gambar QR code ke dalam view
        return view('pages.qr.index', [
            'layout' => 'top-menu',
            'qrCodeImagePath' => $qrCodeImagePath,
        ]);
    }
}
