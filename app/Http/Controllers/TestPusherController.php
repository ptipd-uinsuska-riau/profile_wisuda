<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\StatusUpdated;

class TestPusherController extends Controller
{
    public function index()
    {
        $updatedStatus = 'Data status updated';
        event(new StatusUpdated($updatedStatus)); // $newStatus adalah status baru
        return response()->json(['message' => 'Data status updated']);
    }
}
