<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function sell($id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock > 0) {
            $product->stock -= 1;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Product sold successfully');
        } else {
            return redirect()->route('products.index')->with('error', 'Product out of stock');
        }
    }
}
