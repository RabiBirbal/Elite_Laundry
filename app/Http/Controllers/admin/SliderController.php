<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider="";
        return view('admin.slider.slider-add',compact("slider"));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider=new Slider;
        if($request->status){
            $slider->status = $request->status;
        }
        else{
            $slider->status = "off";
        }

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/slider/',$filename);
            $slider->image=$filename;
        }

        $slider->save();
        return redirect()->route('slider.show')->with('success', 'Slider has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sliders=Slider::orderby('created_at','asc')->get();
        return view('admin.slider.slider-show',compact("sliders"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('admin.slider.slider-add',compact("slider"));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider=Slider::find($request->id);
        if($request->status){
            $slider->status = $request->status;
        }
        else{
            $slider->status = "off";
        }

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/slider/',$filename);
            $slider->image=$filename;
        }

        $slider->save();
        return redirect()->route('slider.show')->with('success', 'Slider has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id){
        $slider=Slider::find($id);
        if($slider->status == 'on'){
            $slider->status='off';
        }
        elseif($slider->status == 'off'){
            $slider->status='on';
        }
        $slider->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->delete();

        return back()->with('success', 'Slider has been removed successfully');
    }
}
