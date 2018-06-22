<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblCategory;
use DB;

class CategoryController extends Controller
{
   
    public function index()
    { 
          $this->AuthCheckfun();
        return view('admin.add_category');
    }

    public function all_category()
    {
        $this->AuthCheckfun();
        $datas =TblCategory::all();

       return view('admin.all_category',['datas'=>$datas]);
    }
    public function active(Request $request, $id)
    {
         DB::table('tbl_categories')
       ->where('category_id',$id)
       ->update(['publication_status'=>1]);
       return redirect('/all-category')->with('response','Category Activated successfully');
        
    }
     public function inactive( Request $request, $id)
    {
       DB::table('tbl_categories')
       ->where('category_id',$id)
       ->update(['publication_status'=>0]);
       return redirect('/all-category')->with('response','Category Inactived successfully');

    }

    public function update_category(Request $request,$id)
    {  
        $this->AuthCheckfun();
        $this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
            ]);

        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data=DB::table('tbl_categories')
       ->where('category_id',$id)
       ->update($data);
       return redirect('/all-category');
    }

    public function edit_category($id)
    {
      $this->AuthCheckfun();//authentication check
      $data= DB::table('tbl_categories')
       ->where('category_id',$id)
       ->first(); 
       return view('admin.edit_category',['data'=>$data]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

          $this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status'=>'required',
            ]);
        

        $data = new TblCategory;

        
        $data->category_name=$request->input('category_name');
        $data->category_description=$request->input('category_description');
        $data->publication_status=$request->input('publication_status');

         $data->save();
          return redirect('/add_category')->with('response','Category added successfully');

        //return $request->input('category_name');
    }
    public function delete_category($id)
    {
        DB::table('tbl_categories')
       ->where('category_id',$id)
       ->delete(); 

        return redirect('/all-category');

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
