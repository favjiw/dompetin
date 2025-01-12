@extends('layouts.master')

@section('title', 'My Wallet')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/wallet.css') }}">
@endsection

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">My Wallet</a></li>
    </ul>
@endsection

@section('content')
    <div class="headerr">
        <h1>Wallet</h1>
        <a href="{{ url('/myWallet/create') }}" class="transactionBtn">Create a Wallet</a>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($wallets as $wallet)
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $wallet->name }}</h2>
                        <p>{{ $wallet->type }}</p>
                        <p>Rp {{ number_format($wallet->amount, 0, ',', '.') }}</p>
                        <a href="{{ url('/myWallet/detail/' . $wallet->id) }}" class="transactionBtn">View Transactions</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
