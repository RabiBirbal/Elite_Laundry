<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
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
        $products=Product::where('status','on')->orderby('created_at','desc')->paginate(20);
        $news_latest=News::where('status','on')->latest()->take(4)->get();
        $sessionID = Cookie::get('clickmart');
        $cart=Cart::where('session',$sessionID)->first();
        if($cart){
            $cart_item_count = CartItem::where('cart_id',$cart->id)->count();
        }
        else{
            $cart_item_count="0";
        }

        return view('frontend.product.product-list',compact("profile","categories","products","news_latest","cart_item_count"));
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
    public function view($subcategory)
    {
        // $productName=str_replace('-', ' ', $subcategory);
        $category=SubCategory::where('slug',$subcategory)->first();
        $products=Product::where('subcategory',$category->name)
        ->where('status','on')
        ->orderby('created_at','desc')
        ->paginate(20);
        $profile=CompanyProfile::first();
        $categories=Category::with('subcategory')->where('status','on')->orderby('name','asc')->get();
        $news_latest=News::where('status','on')->latest()->take(4)->get();
        $sessionID = Cookie::get('clickmart');
        $cart=Cart::where('session',$sessionID)->first();
        if($cart){
            $cart_item_count = CartItem::where('cart_id',$cart->id)->count();
        }
        else{
            $cart_item_count="0";
        }

        return view('frontend.product.product-list',compact("products","profile","categories","news_latest","cart_item_count"));
    }

    public function hotProduct()
    {
        $products=Product::where('hot_product','on')
        ->where('status','on')
        ->orderby('created_at','desc')
        ->get();
        $profile=CompanyProfile::first();
        $categories=Category::with('subcategory')->where('status','on')->orderby('name','asc')->get();
        $news_latest=News::where('status','on')->latest()->take(4)->get();
        $sessionID = Cookie::get('clickmart');
        $cart=Cart::where('session',$sessionID)->first();
        if($cart){
            $cart_item_count = CartItem::where('cart_id',$cart->id)->count();
        }
        else{
            $cart_item_count="0";
        }

        return view('frontend.product.hot-product',compact("products","profile","categories","news_latest","cart_item_count"));
    }

    public function show($id)
    {
        $product=Product::where('id',$id)->with('review')->where('status','on')->first();
        $review_count = ProductReview::where('product_id',$id)->where('status','on')->count();
        $profile=CompanyProfile::first();
        $categories=Category::with('subcategory')->where('status','on')->orderby('name','asc')->get();
        $sessionID = Cookie::get('clickmart');
        $cart=Cart::where('session',$sessionID)->first();
        $news_latest=News::where('status','on')->latest()->take(4)->get();
        if($cart){
            $cart_item_count = CartItem::where('cart_id',$cart->id)->count();
        }
        else{
            $cart_item_count="0";
        }

        return view('frontend.product.product-detail',compact("product","profile","categories","news_latest","cart_item_count","review_count"));
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
