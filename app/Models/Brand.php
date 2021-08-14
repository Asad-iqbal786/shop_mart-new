<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'photo',
        'status',
    ];

     // show product with special category
     public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id');
    }


    
    public static function getProductByBrand($slug){
        // dd($slug);
        return Brand::with('products')->where('slug',$slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }




}
