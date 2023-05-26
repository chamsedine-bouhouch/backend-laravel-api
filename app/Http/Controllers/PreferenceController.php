<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreferenceRequest;
use App\Http\Requests\UpdatePreferenceRequest;
use App\Http\Resources\PreferenceResource;
use App\Models\Preference;

class PreferenceController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/preferences",
     *      operationId="getPreferencesList",
     *      tags={"preferences"},
     *      summary="Display a listing of the resource",
     *      description="Returns list of preferences",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PreferenceResource")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of preferences
     */
    public function index()
    {
        return new PreferenceResource(Preference::all());
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
