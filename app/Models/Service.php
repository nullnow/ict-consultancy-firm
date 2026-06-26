<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = ['title', 'slug', 'subtitle', 'intro_text', 'results_summary', 'icon_class'];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class)->orderBy('sort_order');
    }

    public function industries(): HasMany
    {
        return $this->hasMany(Industry::class);
    }
}
