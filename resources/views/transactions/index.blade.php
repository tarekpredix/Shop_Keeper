@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Transactions</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a>
    </div>
</div>
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->product->name }}</td>
            <td>{{ $transaction->quantity }}</td>
            <td>${{ $transaction->total }}</td>
            <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
