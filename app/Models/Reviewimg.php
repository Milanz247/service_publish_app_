<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewimg extends Model
{
    use HasFactory;


    protected $guarded= [
        'review_id',
        'photo_name',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}
