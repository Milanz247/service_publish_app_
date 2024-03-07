<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'service_user_id',
        'description',
        'image_id',
        'status',
        'service_category_id',
        'service_subcategory_id',
        'service_location',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'service_user_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'service_category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'service_subcategory_id');
    }

    public function serviceImages()
    {
        return $this->hasMany(ServiceImg::class, 'service_id');
    }
}
