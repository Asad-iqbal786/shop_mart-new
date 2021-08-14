<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','photo','status','is_parent','parent_id','added_by'];

    // public static function getChildByParentID($id){
    //     return Category::where('parent_id',$id)->pluck('title','id');
    // }

    // show product with special category
    public function products(){
        return $this->hasMany('App\Models\Product','cat_id','id');
    }
    // show product brand with special category
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
    // public static function getAllParentWithChild(){
    //     return Category::with('child_cat')->where('is_parent',1)->where('status','active')->orderBy('title','ASC')->get();
    // }
    public static function getProductByCat($slug){
        // dd($slug);
        return Category::with('products')->where('slug',$slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }


}
