<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'grade'];

    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }
}