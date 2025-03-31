<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $table = 'locations';
    protected $fillable = [
        'name',
        'address',
    ];

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
