<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[ 'name', 'price', 'description', 'image'];

 public static function getAllProductFromCart(){
        return Cart::with('product')->where('user_id',auth()->user()->id)->get();
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function getAllProductByid(){
        return Cart::with('product')->where('user_id',auth()->user()->id)->get();
    }



}
