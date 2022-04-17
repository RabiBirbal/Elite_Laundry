<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PDF;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=CompanyProfile::first();
        $categories=Category::with('subcategory')->where('status','on')->orderby('name','asc')->get();
        $news_latest=News::where('status','on')->latest()->take(4)->get();
    //     $cart=Cart::where('session',session()->getId())->first();
    //    $cart_items= CartItem::where('cart_id',$cart->id)->with('product')->get();
        $sessionID = Cookie::get('clickmart');
        $cart=Cart::where('session',$sessionID)->first();
        if($cart){
            $cart_items=Product::join('cart_items','cart_items.product_id','=','products.id')
            ->where('cart_items.cart_id',$cart->id)
            ->get();
            $cart_item_count = CartItem::where('cart_id',$cart->id)->count();
            $cart_sum=CartItem::where('cart_id',$cart->id)->sum('total');
            $discount=Product::join('cart_items','cart_items.product_id','=','products.id')
            ->where('cart_items.cart_id',$cart->id)
            ->sum('discount');
        }
        else{
            $cart_items="";
            $cart_item_count="0";
            $discount="";
            $cart_sum="";
        }
        
        return view('frontend.cart.cart-details',compact("profile","categories","cart_items","cart_item_count","cart_sum","discount","news_latest"));
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
        $sessionID = Cookie::get('clickmart');
            if (!isset($sessionID)) {
                $sessionID = session()->getId();
                Cookie::queue('clickmart', $sessionID, '2628000');
            }
            $cart = Cart::where('session', $sessionID)->first();
            if (!$cart) {
                $cart = Cart::create([
                    'session' => $sessionID,
                ]);
            }
            $cart->save();
            
            $data = CartItem:: where('cart_id',$cart->id)->where('product_id',$request->id)->first();
            if($data){
                return back()->with('error', 'Product already exists in cart');
            }
            else{
                $cart_item=new CartItem;
                $cart_item->cart_id=$cart->id;
                $cart_item->product_id=$request->id;
                $cart_item->qty=$request->quantity;
                $cart_item->total=$request->quantity * $request->price;
                $cart_item->status="1";
    
                $cart_item->save();
    
                return back()->with('success', 'Product has been added to cart successfully');
            }
           
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
    public function destroy(Request $request)
    {
        $cart_item =CartItem::find($request->id);

        $cart_item->delete();
        return back()->with('success', 'Product has been removed from cart successfully');
    }

    public function changeQty(Request $request)
    {   
        $data= CartItem::find($request->id);
        $data->qty = $request->value;
        $product = Product::find($data->product_id);
        $data->total = $product->price * $request->value;
        $data->update();
        return back()->with('success', 'Quantity has been updated successfully');

    }
}
