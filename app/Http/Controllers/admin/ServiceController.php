<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service="";
        return view ('admin.service.service-add',compact("service"));
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
            'name' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        if($request->status){
            $service->status = $request->status;
        }
        else{
            $service->status = "off";
        }
        if($request->hasfile('thumbnail')){
            $file=$request->file('thumbnail');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/service/',$filename);
            $service->thumbnail=$filename;
        }

         $service->save();
         return redirect()->route('service.show')->with('success', 'Service has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $services=Service::orderby('created_at','desc')->get();
        return view('admin.service.service-show',compact("services"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::find($id);
        return view('admin.service.service-add',compact("service"));
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $service = Service::find($request->id);
        $service->name = $request->name;
        $service->description = $request->description;
        if($request->status){
            $service->status = $request->status;
        }
        else{
            $service->status = "off";
        }
        
        if($request->hasfile('thumbnail')){
            $file=$request->file('thumbnail');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/service/',$filename);
            $service->thumbnail=$filename;
        }

         $service->save();
         return redirect()->route('service.show')->with('success', 'service has been updated successfully');
    }

    public function changeStatus($id){
        $service=Service::find($id);
        if($service->status == 'on'){
            $service->status='off';
        }
        elseif($service->status == 'off'){
            $service->status='on';
        }
        $service->update();
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
        $service=Service::find($request->id);
        $service->delete();
        return back()->with('success', 'service has been removed successfully');
    }
}
