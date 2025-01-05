@extends('layouts.master')

@section('title', 'Add Transaction')

@section('content')
    <div class="container">
        <h1>Add Transaction</h1>
        <form action="{{ url('/transactions/store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type:</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="transaction_date" class="form-label">Date:</label>
                <input type="date" id="transaction_date" name="transaction_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Transaction</button>
            <a href="{{ url('/transactions') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
