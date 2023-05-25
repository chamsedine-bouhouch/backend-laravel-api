<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PreferenceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get all of the preferences for the PreferenceCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preferences(): HasMany
    {
        return $this->hasMany(Preference::class);
    }
}
