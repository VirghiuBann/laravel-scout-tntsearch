<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {
        $products = Product::select([
            'id',
            'name',
            'slug',
            'model',
            'imageUrl',
            'state',
            'brand_id',
            'sub_category_id',
            'category_id'
        ])
            ->with([
                'subcategory:id,name,category_id',
                'category:id,name',
                'brand:id,name'
            ])
            ->orderBy('id', 'desc')
            ->paginate(10);

        dd($products->toArray());
    }

    public function powerJoin()
    {
        $products = Product::joinRelationshipUsingAlias('category', 'cat')
            ->with('category')
            ->limit(5)
            ->get();

        dd($products->toArray());
    }
}
