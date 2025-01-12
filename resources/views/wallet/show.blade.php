@extends('layouts.master')

@section('title', 'Wallet Details')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/wallet_detail.css') }}">
@endsection

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/myWallet') }}">My Wallet /</a></li>
        <li class="breadcrumb-item"><a href="#">Wallet Details</a></li>
    </ul>
@endsection

@section('content')
<div class="container">
    <div class="wallet-card">
        <h1>{{ $wallet->name }}</h1>
        <p class="wallet-type"><strong>Type:</strong> {{ $wallet->type }}</p>
        <p class="wallet-amount"><strong>Amount:</strong> Rp {{ number_format($wallet->amount, 0, ',', '.') }}</p>
        <a href="{{ url('/myWallet') }}" class="backBtn">Back to Wallets</a>
    </div>
</div>
@endsection
