<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\User;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    

    public function home()
    {
        $discount=Product::where('status','active')->where('discount',1)->orderBy('price','DESC')->limit(2)->get();
      
        $banners=Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        // return $banner;
        // show category 3 products through this 
        $category=Category::where('status','active')->limit(3)->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $category;
        $products=Product::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        return view('frontend.index')
             ->with('discount',$discount)
            ->with('products',$products)
            ->with('category',$category)    
            ->with('banners',$banners);
    }


    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }
    public function product(){
        $products= Product::all();
        return view('frontend.pages.product_gallery')
        ->with('products',$products);
    }
    











    public function productCategory($slug)
    {
        // dd ($slug);
        $categories= Category::with(['products','brand'])->where('slug',$slug)->first();
        // dd($product_detail);
        // return $categories;
        $cat=Category::where('status','active')->limit(10)->with('products')->where('is_parent',1)->orderBy('title','ASC')->get();
        $brand=Brand::all();
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.pages.product_category')
        ->with('brand',$brand)
        ->with('cat',$cat)
        ->with('recent_products',$recent_products)
        ->with('categories',$categories);
    }

    public function productCat(Request $request,$slug){
        $products=Category::getProductByCat($request->slug);
        // return $request->slug;
        $cat=Category::where('status','active')->limit(10)->with('products')->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $cat;
        $brand=Brand::all();
        // return $brand;
        

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();


        return view('frontend.pages.product-cat')
        ->with('recent_products',$recent_products)
        
        ->with('brand',$brand)
        ->with('products',$products->products)
        ->with('cat',$cat);

    }
    public function productBrand(Request $request,$slug)
    {
        $products=Brand::getProductByBrand($request->slug);
        // return $products;
        $brand=Brand::all();
        $cat=Category::where('status','active')->limit(10)->with('products')->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $cat;

        return view('frontend.pages.product_brand')
        ->with('brand',$brand)
        ->with('cat',$cat)
        ->with('products',$products->products);
    }









    public function productDetails($slug)
    {
        // dd ($slug);
        $products= Product::with('rel_prods')->where('slug',$slug)->first();
        // dd($product_detail);
        $productAttribute= ProductAttribute::all();
        if('$product'){
            return view('frontend.pages.product_detail',compact('products','productAttribute'));
        }
        else{
            return 'Product details not found.';
        }
    }

    public function getProductByPrice(Request $request)
    {
        if($request->ajax()){
            $data= $request->all();
            echo "<pre>"; print_r($data); die;
            
            $getProductPrice= ProductAttribute::where(['product-id'=>$data['product_id'],'size'=>$data['size']])->first();
            return $getProductPrice->price;

        }
    }







    public function productLists($slug)
    {
        
    }













    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
