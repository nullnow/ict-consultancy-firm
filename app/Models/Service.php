<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'headline',
        'strapline',
        'message',
        'solutions', // Schema: (array) {title, description}
        'results_summary',
        'call_to_action',
        'icon_class',
        'closing_line'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Handles JSON encoding/decoding for the array of solution objects
        'solutions' => 'array',
    ];

    /**
     * Get the features for the service.
     */
    public function features(): HasMany
    {
        return $this->hasMany(Feature::class)->orderBy('sort_order');
    }
}
