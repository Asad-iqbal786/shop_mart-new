<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    public function cartPage()
    {
        $cart=Cart::getAllProductFromCart();
        return view('frontend.pages.cart')->with('carts',$cart);
    }

    public function cartStore(Request $request)
    {
        // dd($request->all());
        $product_qty=$request->input('product_qty');
        $product_id=$request->input('product_id');
        $product=Product::getProductByCart($product_id);
        // return $product;
        $price=$product[0]['offer_price'];
        // dd($price);
        $cart_array=[];
         foreach(Cart::instance('shopping')->content() as $item){
             $cart_array[]=$item->id;
         }
         $resulat= (new \Gloudemans\Shoppingcart\Cart)->instance('shopping')->add($product_id,$product[0]['title'],$product_qty,$price)->associat('App\Models\Product');
        //   return $resulat;
        if($request){
            $response['status']=true;
            $response['product_id']=$product_id;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
            $response['message']='Item was added in your cart';
        }
        return json_encode($response);


    }







    // public function addToCart(Request $request,$id)
    // {
    //     $product = Product::findOrFail($id);
          
    //     $cart = session()->get('cart', []);
  
    //     if(isset($cart[$id])) {
    //         $cart[$id]['stock']++;
    //     } else {
    //         $cart[$id] = [
    //             "title" => $product->title,
    //             "stock" => 1,
    //             "price" => $product->price,
    //             "photo" => $product->photo,
    //         ];
    //     }
          
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product added to cart successfully!');

    // }

    public function cartStores(Request $request)
    {
        dd ($request->all());
    }


    public function updateOne(Request $request)
    {
        if($request->id && $request->stock){
            $cart = session()->get('cart');
            $cart[$request->id]["stock"] = $request->stock;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
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
    public function cartDelete(Request $request){
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success','Cart successfully removed');
            return back();  
        }
        request()->session()->flash('error','Error please try again');
        return back();       
    }

    public function checkout(Request $request)
    {
        return view('frontend.pages.checkout');
    }









}
