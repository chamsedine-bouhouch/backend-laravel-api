<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use App\Http\Services\PreferenceService;
use App\Http\Resources\PreferenceResource;
use App\Http\Requests\StorePreferenceRequest;
use App\Http\Requests\UpdatePreferenceRequest;
/**
 * @OA\SecurityScheme(
 *     securityScheme="bearer",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 * )
 */

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
     *      security={ {"bearer": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PreferenceResource")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *    
     *     )
     *
     * Returns list of preferences
     */
    public function index(Request $request)
    {
        return PreferenceResource::collection(Preference::where('user_id',$request->user()->id)->get());
    }

    /**
     * @OA\Post(
     *      path="/api/preferences",
     *      operationId="storePreference",
     *      tags={"storePreference"},
     *      summary="Store new Preference",
     *      description="Returns Preference data",
     *       security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePreferenceRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Preference")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
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
