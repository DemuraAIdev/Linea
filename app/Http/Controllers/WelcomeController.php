<?php

namespace App\Http\Controllers;

use App\Models\Spots;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get table spots and return it to the view and if request search is not empty, search for the name
        $search = request('search');
        // the table spots has type_id and the table spot_type has id 

        $spots = Spots::where('name', 'like', "%$search%")->with('spot_type')->get();

        return view('index')->with([
            'spots' => $spots,
            'search' => $search
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
