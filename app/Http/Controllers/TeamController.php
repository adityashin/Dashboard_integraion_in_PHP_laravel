<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        $team = team::get();
        return view('display_team',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_team');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $role = $request->get('role');
        $profile = $request->file('profile');

        if(!empty($profile)){
            $filename = $profile->getClientOriginalName();
            $profile->move('images/team',$filename);
        }

        $team = new team([
            'name'=>$name,
            'role'=>$role,
            'profile'=>$filename
        ]);

        $team->save();
        return redirect()->action([TeamController::class,'create']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = team::find($id);
        return view('update_team',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->get('name');
        $role = $request->get('role');
        $profile = $request->file('profile');

        if(!empty($profile)){
            $filename = $profile->getClientOriginalName();
            $profile->move('images/team/',$filename);
        }

        $team = team::find($id);
        $team->name=$name;
        $team->role=$role;
        $team->profile=$filename;
        $team->update();
        return redirect()->action([TeamController::class,'index']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = team::find($id);
        $team->delete();
        return redirect()->action([TeamController::class,'index']);
    }
}
