<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['icon', 'name', 'slug', 'file_types'];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
