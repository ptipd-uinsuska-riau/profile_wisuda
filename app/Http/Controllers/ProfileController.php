<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Events\StatusLiked;
use App\Exports\AbsenExport;
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
    public function index(Request $request)
    {
        $fakultas = Profile::select('fakultas')->distinct()->get();
        $query = Profile::where('hadir', '1')->orWhere('hadir', '0');

        $search = $request->input('search');
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%")
                    ->orWhere('nim', 'LIKE', "%$search%");
            });
        }

        $data = $query->simplePaginate(10);

        return view('pages.profile.index', [
            'data' => $data,
            'fakultas' => $fakultas,
            'search' => $search,
        ]);
    }

    /**
     * Export a listing of the resource.
     */

    public function export()
    {
        return Excel::download(new ProfileExport, 'template_profil_wisuda.xlsx');
    }

    /**
     * Import a listing of the resource.
     */

    public function import(Request $request)
    {

        Excel::import(new ProfileImport, request()->file('file'));
        return to_route('profile.index');
    }

    public function absen(Request $request)
    {
        $fakultasFilter = $request->filter_fakultas;
        return (new AbsenExport)->forFakultas($fakultasFilter)->download('absen-wisuda.xlsx');
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
        // $data = Profile::where('hadir', '1')->get();
        $data = Profile::get();

        //count jumlah data dari $data
        // $count = count($data);
        // $page = $count / 10;
        // $last_page = ceil($page);

        // $format = [
        //     'last_page' => $last_page,
        //     'data' => $data,
        // ];

        return response()->json($data);
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

    public function showData($id)
    {
        // $data = Profile::where('id', 1)->get();
        // return response()->json($data);

        $data = Profile::where('id', $id)->first(); // Menggunakan 'first()' untuk mendapatkan satu data
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getRealtimeData()
    {
        // $data = Profile::where('hadir', 1)->get();
        $data = Profile::get();
        return response()->json($data);
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

        } else {
            Profile::where('id', $request->id)->update([
                'status' => 0
            ]);

        }

        // $updatedStatus = $id;

        event(new StatusLiked($id));
        // return "Event has been sent!";
        // event(new StatusUpdated($updatedStatus));
        return response()->json(['message' => 'Data status updated']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
