<?php

namespace App\Http\Resources;

use App\Models\PreferenceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreferenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'user' => $this->get_user($this),
            'category' => $this->get_preference_category($this),

        ];
    }

    public function get_user($event)
    {
        return new UserResource(
            User::findOrFail($event->user_id)
        );
    }
    public function get_preference_category($event)
    {
        return new PreferenceCategoryResource(
            PreferenceCategory::findOrFail($event->preference_categories_id)
        );
    }
}
