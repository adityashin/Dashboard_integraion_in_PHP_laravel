 <?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        $portfolio = portfolio::get();
        return view('display_portfolio',compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_portfolio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $link = $request->get('link');
        $logo = $request->file('logo');

        if(!empty($logo)){
            $filename = $logo->getClientOriginalName();
            $logo->move('images/portfolio',$filename);
        }

        $portfolio = new portfolio([
            'name'=>$name,
            'description'=>$description,
            'link'=>$link,
            'logo'=>$filename
        ]);

        $portfolio->save();
        echo "data insert";
       // return redirect()->action([PortfolioController::class,'create']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = portfolio::find($id);
        return view('update_portfolio',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $link = $request->get('link'); 
        $logo = $request->file('logo');

        if(!empty($logo)){
            $filename = $logo->getClientOriginalName();
            $logo->move('images/portfolio',$filename);
        }

        $portfolio = portfolio::find($id);
        $portfolio->name=$name;
        $portfolio->description=$description;
        $portfolio->link=$link;
        $portfolio->logo=$filename;
        $portfolio->update();
        return redirect()->action([PortfolioController::class,'index']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = portfolio::find($id);
        $portfolio->delete();
        return redirect()->action([PortfolioController::class,'index']);
    }
}
