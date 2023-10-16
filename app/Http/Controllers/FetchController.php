<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\team;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function service()
    {
        $service = Service::get();
        return view('frontend/service',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function team()
    {
        $team=team::get();
       
        return view('frontend/about',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function portfolio()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function testimonials()
    {
        //
    }
    public function about()
    {
        return view('frontend/about');
    }
}
