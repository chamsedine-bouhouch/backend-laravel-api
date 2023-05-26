<?php

namespace App\Http\Services;

use App\Http\Requests\StorePreferenceRequest;
use App\Models\Preference;

class PreferenceService
{
    public function addPreference( $request): Preference
    {
        $preference = Preference::create([
            'value' => $request->get('value'),
            'user_id' => $request->get('user_id'),
            'preference_categories_id' => $request->get('preference_categories_id'),
        ]);
        return $preference;
    }
}
