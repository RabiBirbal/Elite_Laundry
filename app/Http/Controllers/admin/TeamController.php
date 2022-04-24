<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team="";
        return view('admin.team.team-add',compact("team"));
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
            'role' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $team=new Team;
        $team->name=$request->name;
        $team->role=$request->role;
        if($request->status){
            $team->status = $request->status;
        }
        else{
            $team->status = "off";
        }

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/team/',$filename);
            $team->image=$filename;
        }

        $team->save();
        return redirect()->route('team.show')->with('success', 'Team member has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $teams=Team::orderby('created_at','asc')->get();
        return view('admin.team.team-show',compact("teams"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team=Team::find($id);
        return view('admin.team.team-add',compact("team"));
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
            'role' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $team=Team::find($request->id);
        $team->name=$request->name;
        $team->role=$request->role;
        if($request->status){
            $team->status = $request->status;
        }
        else{
            $team->status = "off";
        }

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/team/',$filename);
            $team->image=$filename;
        }

        $team->update();
        return redirect()->route('team.show')->with('success', 'Team Member has been updated successfully');
    }

    public function changeStatus($id){
        $team=Team::find($id);
        if($team->status == 'on'){
            $team->status='off';
        }
        elseif($team->status == 'off'){
            $team->status='on';
        }
        $team->update();
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
        $team = Team::find($request->id);
        $team->delete();

        return back()->with('success', 'Team has been removed successfully');
    }
}
