<?php

namespace App\Http\Controllers;

use App\Models\Cloud;
use Illuminate\Http\Request;

class CloudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cloud.index',
        [
            'clouds'=>Cloud::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cloud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cloud::saveCloud($request);
        return back()->with('message','VAi save hoia gese no problem');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cloud $cloud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cloud $cloud)
    {
        return view('admin.cloud.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cloud $cloud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cloud $cloud)
    {
        //
    }
}
