<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
    ];


    // public function subcategories()
    // {
    //     return $this->hasMany(SubCategory::class, 'category_id', 'id');
    // }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
