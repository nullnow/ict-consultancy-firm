<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feature extends Model
{
    protected $fillable = ['service_id', 'title', 'items', 'icon_class', 'sort_order'];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'items' => 'array',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
