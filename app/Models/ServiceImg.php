<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImg extends Model
{
    use HasFactory;

    protected $guarded= [
        'service_id',
        'photo_name	',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
