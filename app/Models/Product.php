<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table ="products";

    protected $fillable =[
        'title',
        'slug',
        'summary',
        'description',
        'stock',
        'brand_id',
        'cat_id',
        'child_cat_id',
        'photo',
        'price',
        'offer_price',
        'discount',
        'size',
        'condition',
        'vendor_id',
        'status',
        'brand_id',
        'cat_id',
        'child_cat_id',
        'vendor_id',
    ];
    // this model working from show brand name with products
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->limit(10);
    }
    public static function getProductByCart($id)
    {
       return self::where('id',$id)->get()->toArray();
    }
    






}