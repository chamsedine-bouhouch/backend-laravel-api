<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use App\Http\Services\PreferenceService;
use App\Http\Resources\PreferenceResource;
use App\Http\Requests\StorePreferenceRequest;
use App\Http\Requests\UpdatePreferenceRequest;


class PreferenceController extends Controller
{
    public function __construct(private PreferenceService $preferenceService)
    {
    }
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
        return PreferenceResource::collection(Preference::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreferenceRequest $request)
    {
        $this->preferenceService->addPreference($request);

        return  response()->json([
            'message' => 'Preference added successfully'
        ]);
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
