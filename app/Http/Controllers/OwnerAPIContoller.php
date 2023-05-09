<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerAPIContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Owner::all();
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
        $owner = new Owner();
        $owner->name=$request->name;
        $owner->surname = $request->surname;
        $owner->save();

        return $owner;

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Owner::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $owner = Owner::find($id);
        $owner->name=$request->name;
        $owner->surname = $request->surname;
        $owner->save();

        return $owner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Owner::destroy($id);
        return true;
    }
}
