<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, PowerJoins, Searchable;

    public $asYouType = true;

    protected $fillable = [
        'name',
        'slug',
        'model',
        'brand_id',
        'sub_category_id',
        'category_id'
    ];

    public function searchableAs()
    {
        return 'product_index';
    }

    public function toSearchableArray()
    {
        // $array = $this->toArray();
        $array = array_merge($this->makeHidden(['created_at', 'updated_at'])
            ->toArray(), [
            'category' => $this->category === null ? '' : $this->category->name,
            'subcategory' => $this->subcategory === null ? '' : $this->subcategory->name,
            'brand' => $this->brand === null ? '' : $this->brand->name,
        ]);
        return $array;
    }

    // protected function makeAllSearchableUsing($query)
    // {
    //     return $query
    //     ->with('subcategory')
    //     ->with('category')
    //     ->with('brand');
    // }

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
