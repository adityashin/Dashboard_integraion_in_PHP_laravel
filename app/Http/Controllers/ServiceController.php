<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::get();
        return view('display_service',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $logo = $request->file('logo');

        if(!empty($logo)){
            $filename = $logo->getClientOriginalName();
            $logo->move('images/service',$filename);
        }

        $service = new Service([
            'name'=>$name,
            'description'=>$description,
            'logo'=>$filename
        ]);

        $service->save();
        return redirect()->action([ServiceController::class,'index']);
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
        $service = Service::find($id);
        return view('update_service',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $logo = $request->file('logo');

        if(!empty($logo)){
            $filename = $logo->getClientOriginalName();
            $logo->move('images/service',$filename);
        }

        $service = Service::find($id);
        $service->name=$name;
        $service->description=$description;
        $service->logo=$filename;
        $service->update();
        return redirect()->action([ServiceController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->action([ServiceController::class,'index']);
    }
}
