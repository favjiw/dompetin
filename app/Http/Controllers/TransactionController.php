<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Category;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $transactions = DB::table('transactions')->where('user_id', $id)->get();
        return view('transaction.index', ['transactions' => $transactions]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('transaction.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        DB::insert('INSERT INTO transactions (user_id, category_id, type, amount, description, transaction_date, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)', [
            $user_id,
            $request->category_id,
            $request->type,
            $request->amount,
            $request->description,
            $request->transaction_date,
            now()
        ]);
        return redirect('/transactions')->with('success', 'Transaction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = DB::table('transactions')->where('id', $id)->first();
        if (!$transaction) {
            return redirect('/transactions')->with('error', 'Transaction not found');
        }
        return view('transaction.show', ['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = DB::table('transactions')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        if (!$transaction) {
            return redirect('/transaction')->with('error', 'Transaction not found');
        }
        return view('transaction.edit', compact('transaction', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = Auth::user()->id;
        DB::update('UPDATE transactions SET user_id = ?, category_id = ?, type = ?, amount = ?, description = ?, transaction_date = ? WHERE id = ?', [
            $user_id,
            $request->category_id,
            $request->type,
            $request->amount,
            $request->description,
            $request->transaction_date,
            $id
        ]);
        return redirect('/transactions')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect('/transactions')->with('success', 'Transaction deleted successfully');
    }
}
