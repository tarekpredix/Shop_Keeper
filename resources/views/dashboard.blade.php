
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h3>Dashboard</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Today's Earnings</h5>
                        <p class="card-text">$ {{ $todayEarnings }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yesterday's Earnings</h5>
                        <p class="card-text">$ {{ $yesterdayEarnings }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">This Month's Earnings</h5>
                        <p class="card-text">$ {{ $thisMonthEarnings }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Last Month's Earnings</h5>
                        <p class="card-text">$ {{ $lastMonthEarnings }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
