<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=CompanyProfile::first();
        return view('admin.company-profile.company-profile',compact("profile"));
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
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'short_introduction' => 'required|min:20|max:500',
            'introduction' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'linkedin' => 'nullable',
            'working_hours' => 'nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profile=new CompanyProfile;
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->address=$request->address;
        $profile->short_introduction=$request->short_introduction;
        $profile->introduction=$request->introduction;
        $profile->facebook=$request->facebook;
        $profile->twitter=$request->twitter;
        $profile->instagram=$request->instagram;
        $profile->youtube=$request->youtube;
        $profile->linked_in=$request->linkedin;
        $profile->working_hours=$request->working_hours;

        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->logo=$filename;
        }
        if($request->hasfile('favicon')){
            $file=$request->file('favicon');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->favicon=$filename;
        }

        $profile->save();
        return back()->with('success', 'Company Profile has been added successfully');
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
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'short_introduction' => 'required|min:20|max:600',
            'introduction' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'linkedin' => 'nullable',
            'working_hours' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $profile=CompanyProfile::find($request->id);
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->address=$request->address;
        $profile->short_introduction=$request->short_introduction;
        $profile->introduction=$request->introduction;
        $profile->facebook=$request->facebook;
        $profile->twitter=$request->twitter;
        $profile->instagram=$request->instagram;
        $profile->youtube=$request->youtube;
        $profile->linked_in=$request->linkedin;
        $profile->working_hours=$request->working_hours;

        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->logo=$filename;
        }
        if($request->hasfile('favicon')){
            $file=$request->file('favicon');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->favicon=$filename;
        }

        $profile->save();
        return back()->with('success', 'Company Profile has been added successfully');
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
