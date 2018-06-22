<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $this->AuthCheckfun();
    	return view('admin.add_product');
    }

    public function save_product(Request $request)
    {
    	$data =array();
    	$data['product_name']=$request->input('product_name');
    	$data['category_id']=$request->input('category_id');
    	$data['manufacture_id']=$request->input('manufacture_id');
    	$data['product_short_description']=$request->input('product_short_description');
    	$data['product_long_description']=$request->input('product_long_description');
    	$data['product_price']=$request->input('product_price');
    	$data['product_size']=$request->input('product_size');
    	$data['product_color']=$request->input('product_color');
    	$data['publication_status']=$request->input('publication_status');


    	$image =$request->file('product_image');
    	if($image)
    	{
    		$image_name=str_random(20);
    		$exe=strtolower(
    			$image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$exe;
    		$image_upload='image/';
    		$image_url=$image_upload.$image_full_name;
    		$success=$image->move($image_upload,$image_full_name);
    		if($success)
    		{
    			$data['product_image']=$image_url;
    			DB::table('tbl__products')->insert($data);
    			return redirect('/add_product')->with('response','product added  successfully');
    		}
    	}
    	$data['product_image']="";
    			DB::table('tbl__products')->insert($data);
    			return redirect('/add_product')->with('response','product added  successfully');
    }

    public function all_product()
    {
       /* $datas =DB::table('tbl__products')
                    ->join('tbl_categories','tbl__products.product_id','=','tbl_categories.category_id')
                    ->join('tbl_manufacture_brands','tbl__products.product_id','=','tbl_manufacture_brands.manufacture_id')->get();


                    */
            $this->AuthCheckfun();
               $datas =DB::table('tbl__products')
                ->join('tbl_categories','tbl__products.category_id','=','tbl_categories.category_id')
                ->join('tbl_manufacture_brands','tbl__products.manufacture_id','=','tbl_manufacture_brands.manufacture_id')
                ->select('tbl__products.*','tbl_categories.category_name','tbl_manufacture_brands.manufacture_name')
                ->get();

 

    return view('admin.all_product',['datas'=>$datas]);
    }

     public function active(Request $request, $id)
     {
         DB::table('tbl__products')
       ->where('product_id',$id)
       ->update(['publication_status'=>1]);
       return redirect('/all_product')->with('response','Product Actived successfully');
        
     }
     public function inactive( Request $request, $id)
     {
       DB::table('tbl__products')
       ->where('product_id',$id)
       ->update(['publication_status'=>0]);
       return redirect('/all_product')->with('response','Product Inactived successfully');

     }
    public function delete_product($id)
    {

        DB::table('tbl__products')
       ->where('product_id',$id)
       ->delete();

       return redirect('/all_product')->with('response','Product deleted successfully');
    }

    public function AuthCheckfun()
      {
        $result=Session::get('admin_id');
        if($result){
          return;
        }
        else{
          return Redirect('/admin')->send();
        }
      }
}
