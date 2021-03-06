<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        if (Product::where('name', $request->post('name'))->first()) {
            return response()->json('Product with this name already exists', 409);
        }
        return Product::create($request->all());
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function delete(Request $request, Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
