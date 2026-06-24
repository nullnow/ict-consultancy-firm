<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UseCase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'title',
        'example',
        'sort_order'
    ];

    /**
     * Get the service that owns this functional use case.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
