<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable = [
        'name',  
        'description',  
        'image',
        'category_id',
        'author',
        'quantity',
        'producer',
        'price',
        'price_sale',
    ];
    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','category_id','id');
    }
}
