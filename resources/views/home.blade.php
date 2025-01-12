@extends('layouts.master')

@section('title', 'Dashboard')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('header')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <span id="greeting"></span>, {{ $user->name }}
        </li>
    </ul>
@endsection

@section('content')
    <div class="dashboard-content">
        <div class="dashboard">
            <div class="card current-savings">
                <h3>Current Savings</h3><hr>
                <div class="highlight">Rp. {{ number_format($totalMoney, 0, ',', '.') }},-</div>
                <small>Available</small>
            </div>
            <div class="card bank-cards">
                <h3>My Wallet</h3><hr>
                @foreach ($wallets as $wallet)
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $wallet->name }}</h2>
                            <p>{{ $wallet->type }}</p>
                            <p>Rp {{ number_format($wallet->amount, 0, ',', '.') }}</p>
                            <a href="{{ url('/myWallet/detail/' . $wallet->id) }}" class="transactionBtn">View Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card Income">
                <h3>Income This Month</h3><hr>
                <div class="highlight income">Rp. {{ number_format($incomeThisMonth, 0, ',', '.') }},-</div>
            </div>
            <div class="card history">
                <h3>Current History</h3>
                <hr>
                @foreach ($transactions as $date => $items)
                    <h6 style="color: silver;">{{ $date }} -------------------------------------------------------------------</h6>
                    @foreach ($items as $transaction)
                        <div class="history-item">
                            <span>{{ $transaction->description }}</span>
                            <span>{{ $transaction->wallet_name }} ({{ ucfirst($transaction->wallet_type) }})</span>
                            <span class="{{ $transaction->type === 'income' ? 'income' : 'expenses' }}">
                                Rp. {{ number_format($transaction->amount, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                @endforeach
            </div>
            
            <div class="card ">
                <h3>Expenses This Month</h3><hr>
                <div class="highlight expenses">Rp. {{ number_format($expenseThisMonth, 0, ',', '.') }},-</div>
            </div>
            
        </div>
    </div>
@endsection

@section('customjs')
    <script>
        function getGreeting() {
            const hour = new Date().getHours();
            let greeting;

            if (hour >= 5 && hour < 12) {
                greeting = "Good Morning";
            } else if (hour >= 12 && hour < 18) {
                greeting = "Good Afternoon";
            } else if (hour >= 18 && hour < 22) {
                greeting = "Good Evening";
            } else {
                greeting = "Good Night";
            }

            document.getElementById('greeting').innerText = greeting;
        }

        // Jalankan fungsi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', getGreeting);
    </script>
@endsection