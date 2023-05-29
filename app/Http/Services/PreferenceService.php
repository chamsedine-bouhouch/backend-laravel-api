<?php

namespace App\Http\Services;

use App\Http\Requests\StorePreferenceRequest;
use App\Http\Resources\PreferenceListResource;
use App\Models\Preference;
use App\Models\PreferenceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PreferenceService
{
    public function addPreference($request): Preference
    {
        $preference = Preference::create([
            'value' => $request->get('value'),
            'user_id' => $request->get('user_id'),
            'preference_categories_id' => $request->get('preference_categories_id'),
        ]);
        return $preference;
    }
    public function getUserPreferences()
    {

        $categories = PreferenceCategory::pluck('id', 'name');
        foreach ($categories as $key => $category_id) {
       
            $category_preferences = $this->category_preferences_list($category_id);

            $categories[$key] = $category_preferences;
        }

        return $categories;
    }
    public function getUserPreferencesByCategory(PreferenceCategory $preferenceCategory)
    {

       return  $this->category_preferences_list($preferenceCategory->id);

        // return  new PreferenceListResource($category_preferences);
    }
    private function comma_separated_format(Collection $collection)
    {
        $array = $collection->toArray();
        $comma_separated = implode(",", $array);
        return  $comma_separated;
    }
    /**
     * Retrive Category's Preferences as a String
     */
    private function category_preferences_list(int $preferenceCategoryId)
    {
        $category_preferences = Preference::where('user_id', auth()->id())
            ->Where('preference_categories_id', $preferenceCategoryId)
            ->pluck('value');
            $comma_separated_category_preferences = $this->comma_separated_format($category_preferences);

        return $comma_separated_category_preferences;
    }
}
