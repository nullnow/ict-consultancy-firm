<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Industry extends Model
{
    protected $fillable = ['service_id', 'name', 'icon_class'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
