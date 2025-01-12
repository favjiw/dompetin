@extends('layouts.master')

@section('title', 'Create a Wallet')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/myWallet') }}">My Wallet /</a></li>
        <li class="breadcrumb-item"><a href="#">Create a Wallet</a></li>
    </ul>
@endsection

@section('content')
<div class="container">
    <h1>Create a Wallet</h1>
    <form action="{{ url('/myWallet/store') }}" method="POST">
        @csrf
        <label for="name">Wallet Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Wallet Name" required>
        
        <label for="type">Wallet Type</label>
        <select name="type" id="type" required>
            <option value="" disabled selected>Select Wallet Type</option>
            <option value="cash">Cash</option>
            <option value="BCA">BCA</option>
            <option value="BNI">BNI</option>
            <option value="BRI">BRI</option>
            <option value="dana">DANA</option>
            <option value="gopay">GOPAY</option>
            <option value="linkaja">LINKAJA</option>
            <option value="ovo">OVO</option>
            <option value="shopeepay">SHOPEEPAY</option>
        </select>
        <label for="amount">Amount (Rp)</label>
        <div class="input-group">
            <input type="text" id="amount" name="amount" placeholder="0" required>
        </div>
        <button type="submit">Create Wallet</button>
    </form>
</div>

@endsection

@section('customjs')
    <script>
        const amountInput = document.getElementById('amount');

        amountInput.addEventListener('input', function (e) {
            // Remove any non-numeric characters except commas
            let value = e.target.value.replace(/[^\d]/g, '');

            // Format the number as currency (e.g., "10,000")
            value = new Intl.NumberFormat('id-ID').format(value);

            // Set the formatted value back to the input
            e.target.value = value;
        });
    </script>
@endsection

