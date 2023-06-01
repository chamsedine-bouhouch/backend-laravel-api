<?php

namespace App\Http\Controllers;

use App\Http\Resources\PreferenceListResource;
use App\Http\Services\PreferenceService;
use App\Models\Preference;
use App\Models\PreferenceCategory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private PreferenceService $preferenceService)
    {
    }
    /**
     * Display all User Preferences
     */
    public function index(Request $request)
    {
        return PreferenceListResource::collection(
            $request->user()->preferences
        );
    }
    /**
     *  get all User Preferences organized by Category
     */
    public function getPreferences()
    {
        $preferences = $this->preferenceService->getUserPreferences();

        return response()->json($preferences);
    }
    /**
     * Display User Preferences by ِCategory
     */
    public function getPreferencesCategory(PreferenceCategory $preferenceCategory)
    {
        $preferences = $this->preferenceService->getUserPreferencesByCategory($preferenceCategory);

        return response()->json(
            [
                $preferenceCategory->name => $preferences
            ],
            200
        );
    }
}
