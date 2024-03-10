<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'service_id',
        'user_id',
        'service_user_id',
        'rating',
        'description',
        'created_at',
        'updated_at',
    ];

    public function reviewImages()
    {
        return $this->hasMany(Reviewimg::class, 'review_id');
    }
    public function servicerequest()
    {
        return $this->hasMany(ServiceRequest::class, 'service_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
