<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $apiController;

    public function __construct(ApiController $apiController)
    {
        $this->apiController = $apiController;
    }

    /**
     * Show specified view.
     */
    public function loginView(): View
    {
        return view('login.admin', [
            'layout' => 'base'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function login(LoginRequest $request): void
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }

    /**
     * Logout user.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('login');
    }

    public function postlogin(Request $request)
    {
        //panggil fungsi detail dari controller api
        $result = $this->apiController->Login($request);
        // dd($result['status']);
        //jika $result['status] == 1
        $nim = $result['data']['data']['id_pd'];
        // dd($nim);
        if ($result['status'] == 1) {
            //maka redirect ke halaman mahasiswa-absen
            return redirect('/mahasiswa-absen')->cookie('id_pd', $nim, 5);
        } else {
            //jika tidak, maka redirect ke halaman login
            return redirect('/login')->with('session', 'Password atau nim salah');
        }
    }
}
