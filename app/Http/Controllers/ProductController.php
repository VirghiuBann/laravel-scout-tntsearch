<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function tntSearch(Request $request)
    {
        $productConstraint = new Product();
        $productConstraint = $productConstraint->with(['brand:id,name,slug']);
        $q = $request->get('query');
        $product = Product::search($q)
            ->constrain($productConstraint)
            ->get();

        return response()->json([
            'products' => $product
        ]);
    }
}
