<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\sale;
use App\Models\Customer;
use Response;
use Validator;

class ReportController extends Controller
{
public function index()
{
    return view('report.report');
}
        public function salesReport()
        {

            $sale=sale::all();

            $data=customer::join('sales','sales.customer_id','=','customer.id')->select('sales.id','customer.customer_name','customer.customer_email')->orderBy('sales.id')->get();

       // view('your-view')->with('leads', json_decode($leads, true));
       //return view('report.report',['data'=>$data]);
        // return Response::json(array('success'=>true,'res'=>$data));

           return Response()->json($data);
        }
        function saleCount(){
            $customer=customer::all();
            $i = 0;
            foreach($customer as $cust){
                $var[$i]['customers'] = Customer::find($cust->id)->customer_name;
                $var[$i]['count'] = sale::select('customer_id')->with('customer')->where('sales.customer_id', $cust->id)->count();
                $i++;
            }
            // $res=[$sc,$cname];
            $res = $var;
           // return Response::json(array('success'=>true,'dat'=>$res));
           return Response()->json($res);
        }

        function noSaleCust(){
            $query=customer::leftJoin('sales','sales.customer_id','=','customer.id')->orWhereNull('sales.customer_id')->select('customer.customer_name','customer.customer_email')->orderBy('customer.id')->get();
          //  return Response::json(array('success'=>true,'data'=>$query));
            // dd($query);
            $res=$query;
            return Response()->json($res);
        }

        function productCount(){
            $product=product::all();
            $i=0;
            foreach($product as $prod){
                $var[$i]['product'] = product::find($prod->id)->product_name;
                $var[$i]['count'] = sale::select('product_name')->with('product')->where('sales.product_name',$prod->name)->count();
                $i++;
            }
            $res=$var;
          //  return Response::json(array('success'=>true,'res'=>$res));
            return Response()->json($res);
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

