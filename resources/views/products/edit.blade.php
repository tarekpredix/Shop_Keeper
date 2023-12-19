@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Edit Product</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
</div>
<form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock Quantity</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>
    <button type="submit" class="btn btn-warning">Update Product</button>
</form>
@endsection
