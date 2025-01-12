<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $wallets = DB::table('wallets')->where('user_id', $id)->get();
        return view('wallet.index', ['wallets' => $wallets]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $amount = str_replace('.', '', $request->amount);
        DB::insert('INSERT INTO wallets (user_id, name, type, amount, created_at) VALUES (?, ?, ?, ?, ?)', [
            $id,
            $request->name,
            $request->type,
            $amount,
            now()
        ]);
        return redirect('/myWallet')->with('success', 'Wallet created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wallets = DB::table('wallets')->where('id', $id)->first();
        if (!$wallets) {
            return redirect('/myWallet')->with('error', 'Wallet not found');
        }
        return view('wallet.show', ['wallet' => $wallets]);
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
