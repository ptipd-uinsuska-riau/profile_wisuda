<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function Login(Request $request)
    {
        // Initialize Guzzle Client
        $client = new Client();

        $apiKey = '409c98ab5eb82cca8JNRHhsbf98412fdfer210e9';
        $nim = $request->email;

        // Data to be included in the payload body
        $payload = [
            'username' =>  $request->nim,
            'password' =>  $request->password
        ];


        $response = $client->post('http://10.14.200.8:9008/client/auth/login', [
            'headers' => [
                'Api-Key' => $apiKey,
            ],
            'json' => $payload // Include payload data in JSON format
        ]);


        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
    }
}
