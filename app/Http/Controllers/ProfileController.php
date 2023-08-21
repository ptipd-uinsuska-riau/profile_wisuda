<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Events\StatusUpdated;
use App\Exports\ProfileExport;
use App\Imports\ProfileImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Broadcast;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.profile.index');
    }

    /**
     * Export a listing of the resource.
     */

    public function export()
    {
        return Excel::download(new ProfileExport, 'profile_wisuda.xlsx');
    }

    /**
     * Import a listing of the resource.
     */

    public function import(Request $request)
    {
        Excel::import(new ProfileImport, request()->file('file'));
        // dd($request->all());
        return to_route('profile.index');
    }

    public function turncate()
    {
        Profile::truncate();
        return to_route('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getData()
    {
         // limit 20 data
        $data = Profile::where('hadir', '1')->limit(11)->get();

        //count jumlah data dari $data
        $count = count($data);
        $page = $count / 10;
        $last_page = ceil($page);

        $format = [
            'last_page' => $last_page,
            'data' => $data,
        ];

        return response()->json($format);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('pages.profile.show', compact('profile'));
    }

    public function showData()
    {
        // ambil data profile where status = 1
        $data = Profile::where('status', '1')->get();

        //return
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    if ($request->status == 1) {
        Profile::where('id', '!=', $request->id)->update([
            'status' => 0
        ]);

        Profile::where('id', $request->id)->update([
            'status' => 1
        ]);

        $updatedStatus = 1; // Set the updated status here
    } else {
        Profile::where('id', $request->id)->update([
            'status' => 0
        ]);

        $updatedStatus = 0; // Set the updated status here
    }

    Broadcast::channel('status-update', function () {
        return true;
    });

    event(new StatusUpdated($updatedStatus));

    return response()->json([
        'message' => 'success'
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
