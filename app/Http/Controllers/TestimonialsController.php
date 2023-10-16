<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonials::get();
        return view('display_testimonials',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_testimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $cname = $request->get('cname');
        $logo = $request->file('logo');

        if(!empty($logo)){
            $filename = $logo->getClientOriginalName();
            $logo->move('images/testimonials',$filename);
        }

        $testimonials = new Testimonials([
            'name'=>$name,
            'description'=>$description,
            'companyname'=>$cname,
            'logo'=>$filename

        ]);
        $testimonials->save();
        return redirect()->action([TestimonialsController::class,'create']);
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
        $testimonials = Testimonials::find($id);
        return view('update_testimonials',compact('testimonials'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $cname = $request->get('cname');
        $logo = $request->file('logo');

        if(!empty($logo)){
            $filename = $logo->getClientOriginalName();
            $logo->move('images/testimonials',$filename);             
        }
                                        
        $testimonials = Testimonials::find($id);
        $testimonials->name=$name;
        $testimonials->description=$description;
        $testimonials->companyname=$cname;
        $testimonials->logo=$filename;
        $testimonials->update();
        return redirect()->action([TestimonialsController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonials = Testimonials::find($id);
        $testimonials->delete();
        return redirect()->action([TestimonialsController::class,'index']);
    }
}
