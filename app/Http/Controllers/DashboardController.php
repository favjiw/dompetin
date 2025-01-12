<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $totalMoney = DB::table('wallets')->where('user_id', $user->id)->sum('amount');
        $incomeThisMonth = DB::table('transactions')
            ->where('user_id', $user->id)
            ->where('type', 'income')
            ->whereMonth('transaction_date', date('m'))
            ->sum('amount');
        $expenseThisMonth = DB::table('transactions')
            ->where('user_id', $user->id)
            ->where('type', 'expense')
            ->whereMonth('transaction_date', date('m'))
            ->sum('amount');
        $wallets = DB::table('wallets')
            ->where('user_id', $user->id)
            ->limit(3)
            ->get();

        $transactions = DB::table('transactions')
            ->join('wallets', 'transactions.wallet_id', '=', 'wallets.id')
            ->where('transactions.user_id', $user->id)
            ->orderBy('transactions.transaction_date', 'desc')
            ->get([
                'transactions.*', 
                'wallets.name as wallet_name', 
                'wallets.type as wallet_type'
            ])
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->transaction_date)->format('d M Y');
        });
        return view('home', compact('user', 'totalMoney', 'incomeThisMonth', 'expenseThisMonth', 'wallets', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
