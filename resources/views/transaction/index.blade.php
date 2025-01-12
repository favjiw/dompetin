@extends('layouts.master')

@section('title', 'Transactions')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
@endsection

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Transaction</a></li>
        
    </ul>
@endsection

@section('content')

    <div class="row">
        <h1>Transactions</h1>
        <a href="{{ url('/transactions/create') }}" class="transactionBtn">Create a Transaction</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop transaksi -->
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>Rp. {{ number_format($transaction->amount, 0, ',', '.') }},-</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>
                        <a href="{{ url('/transactions/detail/' . $transaction->id) }}" class="btn btn-sm btn-warning">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
