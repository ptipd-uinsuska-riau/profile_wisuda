<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Exports\ProfileExport;
use App\Imports\ProfileImport;
use Maatwebsite\Excel\Facades\Excel;

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
        //
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
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
