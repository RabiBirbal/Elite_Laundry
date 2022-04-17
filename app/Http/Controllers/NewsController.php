<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news="";
        $news_latest=News::where('status','on')->latest()->take(4)->get();
        return view('admin.news.news-add',compact("news","news_latest"));
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
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news=new News;
        $news->title=$request->title;
        $news->short_description=$request->short_description;
        $news->description=$request->description;
        if($request->status){
            $news->status=$request->status;
        }
        else{
            $news->status="off";
        }
        
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/news/',$filename);
            $news->image=$filename;
        }

        $news->save();
        return redirect()->route('news.show')->with('success', 'News has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $news_list=News::orderby('created_at','desc')->get();
        return view('admin.news.news-show',compact("news_list"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=News::find($id);
        return view('admin.news.news-add',compact("news"));
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
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news=News::find($request->id);
        $news->title=$request->title;
        $news->short_description=$request->short_description;
        $news->description=$request->description;
        if($request->status){
            $news->status=$request->status;
        }
        else{
            $news->status="off";
        }
        
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/news/',$filename);
            $news->image=$filename;
        }

        $news->save();
        return redirect()->route('news.show')->with('success', 'News has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id){
        $news=News::find($id);
        if($news->status == 'on'){
            $news->status='off';
        }
        elseif($news->status == 'off'){
            $news->status='on';
        }
        $news->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $news=News::find($request->id);
        $news->delete();
        return back()->with('success', 'News has been removed successfully');
    }
}
