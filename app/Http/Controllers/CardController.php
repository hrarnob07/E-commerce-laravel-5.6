<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;

class CardController extends Controller
{
    public function add_to_card(Request $request)
    {
    	
    	$product_id=$request->product_id;
    	$product_info=DB::table('tbl__products')
    					->where('product_id',$product_id)
    					->first();


    	$data['qty']=$request->input('qty');
    	$data['id']=$request->product_id;
    	$data['name']=$product_info->product_name;
    	$data['price']=$product_info->product_price;
    	$data['options']['image']=$product_info->product_image;
    	
    		Cart::add($data);

    	return Redirect::to('/show_card');
    }
    public function show_card()
    {
    	$all_publish_category=DB::table('tbl_categories')
    						->where('publication_status',1)
    						->get();

    	return view('pages.add_to_cart',['all_publish_category'=>$all_publish_category]);

    }

    public function delete($id)
    {
        Cart::update($id,0);
        return Redirect::to('/show_card');
    }

    public function update_cart(Request $request)
    {

        $qty =$request->quantity;
        $rowId =$request->rowId;
         Cart::update($rowId,$qty);
        return Redirect::to('/show_card'); 

    }



}
