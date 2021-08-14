<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\ProductAttribute;
use DB;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::orderBy('id','DESC')->paginate(10);
        return view('backend.product.index')->with('products',$product);
    }

    public function productstatus(Request $request)
    {
        if($request->mode=='true'){
            DB::table('products')->where('id',$request->id)->update(['status'=>'active']);
        }else{
            DB::table('products')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Sussfully updated products status','status'=>true]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::get();
        $user=User::get();

        $category=Category::where('is_parent',1)->get();
        // return $category;
        return view('backend.product.create')
        ->with('categories',$category)
        ->with('users',$user)
        ->with('brands',$brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'stock'=>'nullable|numeric',
            'price'=>'nullable|numeric',
            'discount'=>'nullable|numeric',
            'photo'=>'required',
            'cat_id'=>'nullable|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'size'=>'nullable',
            'condition'=>'nullable',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data= $request->all();
        $slug=Str::slug($request->input('title'));
        $slug_count=Product::where('slug',$slug)->count();
        if($slug_count>0){
            $slug =time().'-'.$slug;
        }
        $data['slug']=$slug;
        $data['offer_price']=($request->price-($request->price*$request->discount)/100);
        //return $data;
       
       $status=Product::create($data);
       if($status){
           request()->session()->flash('success','Product successfully added');
       }
       else{
           request()->session()->flash('error','Error occurred while adding Product');
       }
       return redirect()->route('product.index');





    }
    public function productAttributes(Request $request,$id)
    {
        // return $request->all();
        $this->validate($request,[
            'size'=>'nullable|string',
            'original_price'=>'nullable|numeric',
            'offer_price'=>'nullable|numeric',
            'stock'=>'nullable|numeric',
        ]);
        // $data=$request->all();
        // foreach($data['original_price'] as $key=>$val) {
        //     if(!empty($val)){
        //         $attribute =new ProductAttribute;
        //         $attribute['original_price']=$val;
        //         $attribute['offer_price']=$data['offer_price'][$key];
        //         $attribute['stock']=$data['stock'][$key];
        //         $attribute['product_id']=$id;
        //         $attribute['size']=$data['size'][$key];
        //         $attribute->save();
        //     }
        // }
        $product=Product::all();
        $attribute = new ProductAttribute;
        $attribute->size  = $request->size ;                  
        $attribute->offer_price = $request->offer_price; 
        $attribute->stock = $request->stock;
        $attribute->original_price = $request->original_price;
        $attribute->product_id = $id;
        // return $attribute;
        $attribute->save();
        
        return redirect()->back()->with('product',$product);
    }

  
    public function show($id)
    {
        $product=Product::find($id);
        $productatr=ProductAttribute::where('product_id',$id)->get();
        return view('backend.product.product_attributes')
        ->with('productatr',$productatr)
        ->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::get();
        $product=Product::findOrFail($id);
        $category=Category::where('is_parent',1)->get();
        $items=Product::where('id',$id)->get();
        // return $items;
        return view('backend.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product=Product::find($id);
        if($product){
            $this->validate($request,[  
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'stock'=>'nullable|numeric',
            'price'=>'nullable|numeric',
            'discount'=>'nullable|numeric',
            'photo'=>'required',
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'size'=>'nullable',
            'condition'=>'nullable',
            'status'=>'nullable|in:active,inactive',
        ]);
        }
        

        $data= $request->all();
        $data['offer_price']=($request->price-($request->price*$request->discount)/100);
        $status=$product->fill($data)->save();
        
       if($status){
           request()->session()->flash('success','Product successfully added');
       }
       else{
           request()->session()->flash('error','Error occurred while adding Product');
       }
       return redirect()->route('product.index');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
