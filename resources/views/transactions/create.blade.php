@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Add Transaction</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back to Transactions</a>
    </div>
</div>
<form action="{{ route('transactions.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select class="form-select" id="product_id" name="product_id" required>
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Transaction</button>
</form>
@endsection
