<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'coffee_id',
        'supply_date',
        'quantity',
        'note',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function coffee()
    {
        return $this->belongsTo(Coffee::class);
    }
}