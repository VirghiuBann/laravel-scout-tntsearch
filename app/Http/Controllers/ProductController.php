<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)
            ->with(['brand:id,name', 'category:id,name', 'subcategory:id,name'])
            ->get();
        return response()->json([
            'products' => $products
        ]);
    }

    public function tntSearch(Request $request)
    {
        $productConstraint = new Product();
        $productConstraint = $productConstraint->with(['brand:id,name,slug', 'category:id,name', 'subcategory:id,name']);
        $q = $request->get('query');
        $product = Product::search($q)
            ->constrain($productConstraint)
            ->get();

        return response()->json([
            'products' => $product
        ]);
    }
}
