<?php

namespace App\Http\Controllers;

use App\Traits\Uuids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\product;
use App\Models\Category;
use App\Models\sale;
use App\Models\Customer;


use Datatables;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//         $items = Items::all()->toJson();
// returnview('items.create', compact('items'));

    public function index()
    {
        // $category=new Category();
 // $product=product::get();
        if(request()->ajax()) {
            return datatables()->of(product::select('*'))
            ->addColumn('action', 'product.product-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $category= Category::all();
        return view('product.product',compact('category'));
    }


    public function store(Request $request)
    {
        $productId = $request->id;
         $product=product::get();

      $product =  product::updateOrCreate(['id'=>$productId],

       [
         'product_name' => $request->name,
           'price' => $request->price,
           'category_id' => $request->category
        ]);


        return Response()->json($product);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       // $category= Category::get();
        $where = array('id' => $request->id);
        $product  = product::where($where)->first();

        //  $category= Category::get();
        //  $category_name=$category->category_name;
        // $category_id=$product->category_id;
        // $category=category::array_where(array($category_id => $category_name));
        //$category= Category::all();

        return Response()->json($product);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = product::where('id',$request->id)->delete();

        return Response()->json($product);
    }

}

