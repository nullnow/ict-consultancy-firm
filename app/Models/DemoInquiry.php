<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoInquiry extends Model
{
    protected $fillable = [
        'full_name',
        'company_name',
        'phone_number',
        'email',
        'fleet_size',
        'service_interested_in',
        'message',
        'status'
    ];
}
