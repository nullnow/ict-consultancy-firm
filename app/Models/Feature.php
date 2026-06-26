<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use InvalidArgumentException;

class Feature extends Model
{
    protected $fillable = [
        'service_id', // Ensure this is present if using ID constraints
        'service_slug',
        'title',
        'content',
        'icon_class',
        'sort_order'
    ];

    /**
     * The "booted" method of the model.
     * Intercepts saving events to automatically pull slug from parent Service
     */
    protected static function booted(): void
    {
        static::saving(function (Feature $feature) {
            // If a related service relation or service_id exists, pull its live slug
            if ($feature->service) {
                $feature->service_slug = $feature->service->slug;
            }
        });
    }

    /**
     * Intercept the content attribute to strictly enforce a sequential list.
     */
    protected function content(): Attribute
    {
        return Attribute::make(
            // When retrieving from DB: Decode JSON back into a simple PHP array
            get: fn (?string $value) => $value ? json_decode($value, true) : [],

            // When saving to DB: Validate that it is strictly a simple list
            set: function (mixed $value) {
                if (!is_array($value) || !array_is_list($value)) {
                    throw new InvalidArgumentException(
                        'The content attribute must be a simple, sequential list of items (no key-value pairs allowed).'
                    );
                }

                return json_encode($value);
            }
        );
    }

    /**
     * Get the service that owns the feature.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_slug', 'slug');
    }
}
