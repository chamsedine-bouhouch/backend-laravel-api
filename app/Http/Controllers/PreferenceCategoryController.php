<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreferenceCategoryRequest;
use App\Http\Requests\UpdatePreferenceCategoryRequest;
use App\Http\Resources\PreferenceCategoryResource;
use App\Models\PreferenceCategory;
use Illuminate\Http\JsonResponse;

class PreferenceCategoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/preference-categories",
     *      operationId="getPreferenceCategoriesList",
     *      tags={"preferenceCategories"},
     *      summary="Display a listing of the resource",
     *      description="Returns list of preferenceCategories",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PreferenceCategoryResource")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of Preference Categories
     */
    public function index()
    {
        return PreferenceCategoryResource::collection(PreferenceCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreferenceCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PreferenceCategory $preferenceCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreferenceCategoryRequest $request, PreferenceCategory $preferenceCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreferenceCategory $preferenceCategory)
    {
        //
    }
}
