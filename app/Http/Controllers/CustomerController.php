<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
public function index(Request $request)
        {

        //   $categoris = Category::where('parent_id',0)->get();

        //   return view('category',["categoris" => $categoris]);
        if(request()->ajax()) {
            return datatables()->of(Customer::select('*'))
            ->addColumn('action', 'customer.customer-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
      //  $category= Category::all();
        return view('customer.customer');
        }

        public function store(Request $request)
        {
            // $parent_id = $request->cat_id;

            // $subcategories = Category::where('id',$parent_id)
            //                       ->with('subcategories')
            //                       ->get();
            // return response()->json([
            //     'subcategories' => $subcategories
            // ]);

                $customerId = $request->id;
                 $customer=Customer::get();

              $customer =  Customer::updateOrCreate(['id'=>$customerId],

               [
                 'customer_name' => $request->name,
                   'customer_dob' => $request->dob,
                   'customer_email' => $request->email
                ]);


                return Response()->json($customer);

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
                $customer  = Customer::where($where)->first();

                //  $category= Category::get();
                //  $category_name=$category->category_name;
                // $category_id=$product->category_id;
                // $category=category::array_where(array($category_id => $category_name));
                //$category= Category::all();

                return Response()->json($customer);
            }


            /**
             * Remove the specified resource from storage.
             *
             * @param  \App\company  $company
             * @return \Illuminate\Http\Response
             */
            public function destroy(Request $request)
            {
                $customer = Customer::where('id',$request->id)->delete();

                return Response()->json($customer);
            }
        }


