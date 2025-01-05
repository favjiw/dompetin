<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = DB::select('SELECT * FROM transactions');
        return view('transaction.index', ['transactions' => $transactions]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::insert('INSERT INTO transactions (user_id, category_id, type, amount, description, transaction_date, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)', [
            $request->user_id,
            $request->category_id,
            $request->type,
            $request->amount,
            $request->description,
            $request->transaction_date,
            now()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = DB::table('transactions')->where('id', $id)->first();
        if (!$transaction) {
            return redirect('/')->with('error', 'Transaction not found');
        }
        return view('transaction.show', ['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('transaction.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::update('UPDATE transactions SET user_id = ?, category_id = ?, type = ?, amount = ?, description = ?, transaction_date = ? WHERE id = ?', [
            $request->user_id,
            $request->category_id,
            $request->type,
            $request->amount,
            $request->description,
            $request->transaction_date,
            $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('DELETE FROM transactions WHERE id = ?', [$id]);
    }
}
