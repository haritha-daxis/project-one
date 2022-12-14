<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grocery;

class GroceryController extends Controller
{
public function index()
{
    return view('grocery');
}

    public function store(Request $request)
    {
           $grocery = new Grocery();
           $grocery->name = $request->name;
           $grocery->type = $request->type;
           $grocery->price = $request->price;

           $grocery->save();
           dd($grocery);
        //    return response()->json(['success'=>'Data is successfully added']);
    return view('grocery');
    }
    // public function show()
    // {
    //     $grocery=Grocery::get();
    //     dd($grocery);
    //     return view('grocery');
    //     // return redirect()->json('grocery');
    // }
}
