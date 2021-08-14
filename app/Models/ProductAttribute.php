<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    // product_attributes

    // protected $table = 'product_attributes';
    protected $fillable=['size','product_id','original_price','offer_price','stock'];

    public function products(){
        return $this->hasMany('App\Models\Product','id');
    }
}
