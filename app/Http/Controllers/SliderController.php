<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tbl_Slider;

class SliderController extends Controller
{
    public function index()
    {
    	return view('admin.add_slider');
    }


    public function save_slider(Request $request)
    {
    	
    		$data =array();
    	$data['publication_status']=$request->input('publication_status');


    	$image =$request->file('slider_image');
    	if($image)
    	{
    		$image_name=str_random(20);
    		$exe=strtolower(
    			$image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$exe;
    		$image_upload='slider/';
    		$image_url=$image_upload.$image_full_name;
    		$success=$image->move($image_upload,$image_full_name);
    		if($success)
    		{
    			$data['slider_image']=$image_url;
    			DB::table('tbl__sliders')->insert($data);
    			return redirect('/add_slider')->with('response','Slider added  successfully');
    		}
    	}
    	$data['slider_image']="";
    			DB::table('tbl__sliders')->insert($data);
    			return redirect('/add_slider')->with('response','Slider added  successfully');
   
    }

    public function all_slider()
    {
    	 $datas =Tbl_Slider::all();

       return view('admin.all_slider',['datas'=>$datas]);
    }

     public function active(Request $request, $id)
    {
         DB::table('tbl__sliders')
       ->where('slider_id',$id)
       ->update(['publication_status'=>1]);
       return redirect('/all_slider')->with('response','Product Actived successfully');
        
    }
     public function inactive( Request $request, $id)
    {
       DB::table('tbl__sliders')
       ->where('slider_id',$id)
       ->update(['publication_status'=>0]);
       return redirect('/all_slider')->with('response','Product Inactived successfully');

    }

     public function delete_slider($id)
    {

        DB::table('tbl__sliders')
       ->where('slider_id',$id)
       ->delete();

       return redirect('/all_slider')->with('response','Product deleted successfully');
    }

    public function slider()
    {
    	 $all_published_slider =Tbl_Slider::all();

       return view('admin.slide',['all_published_slider'=>$all_published_slider]);
    }

}
