@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome to the Dashboard</h1>
    <p>This is your main dashboard page where you can view statistics and other important data.</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <p class="card-text">120</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Income</h5>
                    <p class="card-text">$5,000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Expenses</h5>
                    <p class="card-text">$3,000</p>
                </div>
            </div>
        </div>
    </div>
@endsection
