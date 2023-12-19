@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Products</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
</div>
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>${{ $product->price }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.sell', $product->id) }}" method="post" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sell</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
