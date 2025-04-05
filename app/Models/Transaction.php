<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
    use SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = [
        'invoice',
        'transaction_date',
        'types',
        'notes',
        'tenant_id',
        'status',
        'created_by',
    ];
    protected $casts = [
        'transaction_date' => 'datetime',
    ];
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
