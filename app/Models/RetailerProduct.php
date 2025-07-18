<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RetailerProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'retailer_id',
        'name',
        'description',
        'price',
        'quantity',
        'grade',
    ];

    public function retailer()
   {
    return $this->belongsTo(User::class, 'retailer_id');

   }
}
