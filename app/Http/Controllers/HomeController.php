<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tbl_Slider;

class HomeController extends Controller
{

    public function index()
    {
         $datas =DB::table('tbl__products')
                ->join('tbl_categories','tbl__products.category_id','=','tbl_categories.category_id')
                ->join('tbl_manufacture_brands','tbl__products.manufacture_id','=','tbl_manufacture_brands.manufacture_id')
                ->select('tbl__products.*','tbl_categories.category_name','tbl_manufacture_brands.manufacture_name')
                ->limit(9)
                ->get();
        $all_published_slider =Tbl_Slider::all();

       return view('pages.home',['datas'=>$datas,'all_published_slider'=>$all_published_slider]);
    }


    public function show_product_by_category($id)
    {
        $datas =DB::table('tbl__products')
                ->join('tbl_categories','tbl__products.category_id','=','tbl_categories.category_id')               
                ->select('tbl__products.*','tbl_categories.category_name')
                ->where('tbl_categories.category_id',$id)
                ->where('tbl__products.publication_status',1)
                ->limit(18)
                ->get();
        $all_published_slider =Tbl_Slider::all();
        return view('pages.product_by_category',['datas'=>$datas,'all_published_slider'=>$all_published_slider]);
        
    }


    public function store(Request $request)
    {
        //
    }


public function show_manufacture_brand_by_manufacture_id($id)
    {
        $datas =DB::table('tbl__products')
                ->join('tbl_categories','tbl__products.category_id','=','tbl_categories.category_id')
                ->join('tbl_manufacture_brands','tbl__products.manufacture_id','=','tbl_manufacture_brands.manufacture_id')
                ->select('tbl__products.*','tbl_categories.category_name','tbl_manufacture_brands.manufacture_name')
                ->where('tbl_manufacture_brands.manufacture_id',$id)
                ->limit(18)
                ->get();

    return view('pages.manufacture_by_product',['datas'=>$datas]);
    }

  
    public function view_product($id)
    {
         $datas =DB::table('tbl__products')
                ->join('tbl_categories','tbl__products.category_id','=','tbl_categories.category_id')
                ->join('tbl_manufacture_brands','tbl__products.manufacture_id','=','tbl_manufacture_brands.manufacture_id')              
                ->select('tbl__products.*','tbl_categories.category_name','tbl_manufacture_brands.manufacture_name')
                ->where('tbl__products.product_id',$id)
                ->where('tbl__products.publication_status',1)
                ->first();
                return view('pages.view_product_details',['datas'=>$datas]);
        
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
