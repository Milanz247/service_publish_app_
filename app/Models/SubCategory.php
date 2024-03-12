<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    // public function maincategory()
    // {
    //     return $this->belongsTo(Category::class,'category_id' , 'id');    //make relationship to  get category name to the subcategory table
    // }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function servicerequest()
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
