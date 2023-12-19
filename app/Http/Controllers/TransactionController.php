<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', ['transactions' => $transactions]);
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        $total = $product->price * $request->input('quantity');

        Transaction::create([
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'total' => $total,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully');
    }
}
