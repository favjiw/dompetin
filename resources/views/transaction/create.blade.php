@extends('layouts.master')

@section('title', 'Add Transaction')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/transactions') }}">Transaction /</a></li>
        <li class="breadcrumb-item"><a href="#">Create Transaction</a></li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>
        <form action="{{ url('/transactions/store') }}" method="POST">
            @csrf

            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="" disabled selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="wallet_id">Wallet</label>
            <select id="wallet_id" name="wallet_id" class="form-control" required>
                <option value="" disabled selected>Select Wallet</option>
                @foreach ($wallets as $wallet)
                    <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                @endforeach
            </select>

            
            <label for="type" class="form-label">Type</label>
            <select id="type" name="type" class="form-control" required>
                <option value="" disabled selected>Select Type</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            

            <label for="amount">Amount (Rp)</label>
            <input type="text" id="amount" name="amount" placeholder="0" required>

            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
            

           
            <label for="transaction_date" class="form-label">Date</label>
            <input type="date" id="transaction_date" name="transaction_date" class="form-control" required>
            

            <button type="submit" class="btn btn-primary">Create Transaction</button>

            <a href="{{ url('/transactions') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
