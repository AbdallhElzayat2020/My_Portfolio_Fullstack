<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'service_id',
        'phone_number',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
