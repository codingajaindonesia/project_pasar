<?php

namespace App\Models;

use App\Http\Controllers\IncomeTransactionController;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'category_id',
        'amount',
        'notes',
        'types',
    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
