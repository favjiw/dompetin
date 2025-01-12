<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_page.css') }}">
    <script src="https://kit.fontawesome.com/2b7eddacef.js" crossorigin="anonymous"></script>
    
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dompetin</h2>
        <ul>
            <li><a href="{{ url('/dashboard') }}"><i class="fas fa-solid fa-home"></i> Dashboard</a></li>
            <li><a href="{{ url('/transactions') }}"><i class="fas fa-solid fa-coins"></i> Transaction</a></li>
            <li><a href="{{ url('/wallet') }}"><i class="fas fa-solid fa-wallet"></i> My Wallet</a></li>
            <li><a href="{{ url('/saving') }}"><i class="fas fa-solid fa-sack-dollar"></i> Savings</a></li>
            <li><a href="{{ url('/profile') }}"><i class="fas fa-solid fa-user-large"></i> Profile</a>
        </ul>
        <div class="social_media">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main_content">
        <div class="header">
            @yield('header', 'Welcome! Have a nice day.')
        </div>
        <div class="info">
            @yield('content')
        </div>
    </div>
</div>

@stack('scripts')
</body>
</html>
