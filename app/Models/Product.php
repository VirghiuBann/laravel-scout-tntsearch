<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class Product extends Model
{
    use HasFactory, PowerJoins;

    protected $fillable = [
        'name',
        'slug',
        'model',
        'brand_id',
        'sub_category_id',
        'category_id'
    ];

    // Relations Ship

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
