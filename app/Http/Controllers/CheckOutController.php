<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;

class CheckOutController extends Controller
{
    public function login_check()
    {
    	return view('pages.login');
    }

    function customer_registation(Request $request)
    {    
    	$data=array();
    	$data['customer_name']=$request->input('customer_name');
    	$data['customer_email']=$request->customer_email;
    	$data['password']=$request->password;
    	$data['mobile_number']=$request->mobile_number;

    	$customer_id=DB::table('tbl_customers')
    				 ->insertGetId($data);
    		Session::put('customer_id',$customer_id);
    		Session::put('customer_name',$request->customer_name);

    		return Redirect('/chechout');
    }

    public function chechout()
    {
    	return view('pages.check_out');
    }

    public function save_shipping_details(Request $request)
    {
    	$data=array();
    	$data['shipping_email']=$request->input('shipping_email');
    	$data['shipping_first_name']=$request->shipping_first_name;
    	$data['shipping_last_name']=$request->shipping_last_name;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_city']=$request->shipping_city;
    	$data['shipping_mobile_no']=$request->shipping_mobile_no;
    	

    	$shipping_id=DB::table('tbl_shippings')
    				 ->insertGetId($data);
    	Session::put('shipping_id',$shipping_id);
    	return Redirect('/payment');

    }

    public function customer_login(Request $request)
    {
    	$customer_email=$request->customer_email;
    	$password=$request->password;
    	


    			$result=DB::table('tbl_customers')
                ->where('customer_email',$customer_email)
                ->where('password',$password)->first();
    			

    	if($result)
    	  {
    	  	Session::put('customer_id',$result->customer_id);
    	  	return Redirect('/chechout');
    	  }
    	else
    	  {
    	  	return Redirect('/login_check');
    	  }
    }

    public function customer_logout()
    {
    	Session::flush();
    	return Redirect('/');
    }

    public function payment()
    {
    	return view('pages.payment');
    }



    public function order_place(Request $request)
    {
       $payment_getway=$request->paymentgetway;
        $shipping_id=Session::get('shipping_id');
        $customer_id=Session::get('customer_id');
        $data=array();
        $data['payment_method']=$payment_getway;
        $data['payment_status']="pending";
        $payment_id=DB::table('tbl_payments')
              ->insertGetId($data);

        $odata=  array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::total();
        $odata['order_status']="pending";

        $order_id=DB::table('tbl_orders')
                  ->insertGetId( $odata);

        $contents= Cart::content();
        $oddata=array();

        foreach($contents as $v_data)
        {
              $oddata['order_id']=$order_id;
              $oddata['product_id']=$v_data->id;
              $oddata['product_name']=$v_data->name;
              $oddata['product_price']=$v_data->price;
              $oddata['product_sell_quantity']=$v_data->qty;

              DB::table('tbl_order_details')
                  ->insertGetId($oddata);
             

        }

        if($payment_getway=="Bkash")
        {
            Cart::destroy();
            return view('pages.handcash');

        }
        elseif($payment_getway=="handcast")
        {
            echo "successfully done by handcast";

        }
        elseif($payment_getway=="cart")
        {
            echo "successfully done by cart";

        }
        else
        {
            echo "not selected"; 
        }




    }


    public function manage_order()
    {
        $datas =DB::table('tbl_orders')
                ->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.customer_id')
                ->select('tbl_orders.*','tbl_customers.customer_name')
                ->get();
        return view('admin.manage_order',['datas'=>$datas]);
    }

    public function view_order($id)
    {
        $datas =DB::table('tbl_orders')
                ->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.customer_id')
                ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_orders.order_id')
                ->join('tbl_shippings','tbl_shippings.shipping_id','=','tbl_orders.shipping_id')
                ->select('tbl_orders.*','tbl_order_details.*','tbl_shippings.*','tbl_customers.*')
                ->first();

               // print_r($datas);
        return view('admin.view_order',['datas'=>$datas]);

    }
}
