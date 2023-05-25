<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreferenceRequest;
use App\Http\Requests\UpdatePreferenceRequest;
use App\Models\Preference;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreferenceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Preference $preference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreferenceRequest $request, Preference $preference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preference $preference)
    {
        //
    }
}
