<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuppon extends Model
{
    use HasFactory;
    protected $table='cuppon';
    protected $fillable = [
        'tilte',
        'description',
        'price_cuppon'
    ];
}
