<?php

namespace App\Http\Controllers;

use App\Http\Resources\PreferenceListResource;
use App\Models\Preference;
use App\Models\PreferenceCategory;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $categories = PreferenceCategory::select('id', 'name')->get();
        foreach ($categories as $category) {
            $category_preferences = Preference::where('user_id', auth()->id())
                ->Where('preference_categories_id', $category->id)
                ->select('id', 'value')
                ->get();
            $category->setAttribute($category->name, $category_preferences);
        }
        return response()->json($categories);
    }
    /**
     * Display User Preferences by ِCategory
     */
    public function getPreferencesCategory(PreferenceCategory $preferenceCategory)
    {
        $category_preferences = Preference::where('user_id', auth()->id())
            ->Where('preference_categories_id', $preferenceCategory->id)
            ->select('id', 'value')
            ->get();
        return PreferenceListResource::collection(
            $category_preferences
        );
    }
}
