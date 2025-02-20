<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'wallet_id',
        'type',
        'amount',
        'description',
        'transaction_date',
        'created_at'
    ];
}
