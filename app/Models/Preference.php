<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Preference extends Model
{
    use HasFactory;
    protected $fillable = ['value', 'preference_categories_id', 'user_id'];

    /**
     * Get the user that owns the Preference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the preference_category that owns the Preference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preference_category(): BelongsTo
    {
        return $this->belongsTo(PreferenceCategory::class);
    }
}
