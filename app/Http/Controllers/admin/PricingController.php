<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Stripe\Price;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricing="";
        return view ('admin.pricing.pricing-add',compact("pricing"));
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
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pricing = new Pricing;
        $pricing->title = $request->title;
        $pricing->price = $request->price;
        if($request->status){
            $pricing->status = $request->status;
        }
        else{
            $pricing->status = "off";
        }
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/pricing/',$filename);
            $pricing->image=$filename;
        }

         $pricing->save();
         return redirect()->route('pricing.show')->with('success', 'Pricing has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pricings=Pricing::orderby('created_at','desc')->get();
        return view('admin.pricing.pricing-show',compact("pricings"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricing=Pricing::find($id);
        return view('admin.pricing.pricing-add',compact("pricing"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $pricing = Pricing::find($request->id);
        $pricing->title = $request->title;
        $pricing->price = $request->price;
        if($request->status){
            $pricing->status = $request->status;
        }
        else{
            $pricing->status = "off";
        }
        
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/pricing/',$filename);
            $pricing->image=$filename;
        }

         $pricing->save();
         return redirect()->route('pricing.show')->with('success', 'Pricing has been updated successfully');
    }

    public function changeStatus($id){
        $pricing=Pricing::find($id);
        if($pricing->status == 'on'){
            $pricing->status='off';
        }
        elseif($pricing->status == 'off'){
            $pricing->status='on';
        }
        $pricing->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pricing=Pricing::find($request->id);
        $pricing->delete();
        return back()->with('success', 'Pricing has been removed successfully');
    }
}
