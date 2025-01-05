@extends('layouts.master')

@section('title', 'Transaction Detail')

@section('content')
    <div class="container">
        <h1>Transaction Detail</h1>
        <p><strong>ID:</strong> {{ $transaction->id }}</p>
        <p><strong>Amount:</strong> {{ $transaction->amount }}</p>
        <p><strong>Description:</strong> {{ $transaction->description }}</p>
        <p><strong>Type:</strong> {{ $transaction->type }}</p>
        <p><strong>Date:</strong> {{ $transaction->transaction_date }}</p>

        <a href="{{ url('/transactions/edit/' . $transaction->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ url('/transactions/delete/' . $transaction->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
        </form>
        <a href="{{ url('/transactions') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
