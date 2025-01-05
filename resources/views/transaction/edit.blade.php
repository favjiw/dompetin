@extends('layouts.master')

@section('title', 'Edit Transaction')

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>
        <form action="{{ url('/transactions/update/' . $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $transaction->id }}">

            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $transaction->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type:</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                    <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="3" required>{{ $transaction->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="transaction_date" class="form-label">Date:</label>
                <input type="date" id="transaction_date" name="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
            <a href="{{ url('/transactions') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
