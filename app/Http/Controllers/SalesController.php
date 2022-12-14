<?php

namespace App\Http\Controllers;

use App\Traits\Uuids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\product;
use App\Models\sale;
use App\Models\Customer;


use Datatables;

class SalesController extends Controller
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
            return datatables()->of(sale::select('*'))
            ->addColumn('action', 'sales.sales-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $product= product::all();
        $customer= Customer::all();
        return view('sales.sales',compact('product','customer'));
    }


    public function store(Request $request)
    {
        $saleId = $request->id;
        $sales=sale::all();

      $sales =  sale::updateOrCreate(['id'=>$saleId],

       [
        'customer_id' => $request->cust_name,
         'product_name' => $request->prod_name,
           'sales_qty' => $request->qty

        ]);


        return Response()->json($sales);

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
        $sales  = sale::where($where)->first();

        //  $category= Category::get();
        //  $category_name=$category->category_name;
        // $category_id=$product->category_id;
        // $category=category::array_where(array($category_id => $category_name));
        //$category= Category::all();

        return Response()->json($sales);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sales = sale::where('id',$request->id)->delete();

        return Response()->json($sales);
    }
    public function salesReport()
    {
        $data=sale::get();
        // return $data;
        return Response()->json($data);
    }
    public function customerReport()
    {
        $data=customer::get();
        return $data;
    }
    public function categoryReport()
    {
        $data=Category::get();
        return $data;
    }
    public function productReport()
    {
        $data=product::get();
        return $data;
    }
}

