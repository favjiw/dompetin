@extends('layouts.master')

@section('title', 'Edit Transaction')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/transactions') }}">Transaction /</a></li>
        <li class="breadcrumb-item"><a href="#">Edit Transaction</a></li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>
        <form action="{{ url('/transactions/update/' . $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="" disabled>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="wallet_id">Wallet</label>
            <select id="wallet_id" name="wallet_id" class="form-control" required>
                <option value="" disabled>Select Wallet</option>
                @foreach ($wallets as $wallet)
                    <option value="{{ $wallet->id }}" {{ $transaction->wallet_id == $wallet->id ? 'selected' : '' }}>
                        {{ $wallet->name }}
                    </option>
                @endforeach
            </select>

            <label for="type" class="form-label">Type</label>
            <select id="type" name="type" class="form-control" required>
                <option value="" disabled>Select Type</option>
                <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>

            <label for="amount">Amount (Rp)</label>
            <input type="text" id="amount" name="amount" value="{{ $transaction->amount }}" required>

            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $transaction->description }}</textarea>

            <label for="transaction_date" class="form-label">Date</label>
            <input type="date" id="transaction_date" name="transaction_date" class="form-control"
                value="{{ $transaction->transaction_date }}" required>

            <button type="submit" class="btn btn-primary">Update Transaction</button>

            <a href="{{ url('/transactions') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
