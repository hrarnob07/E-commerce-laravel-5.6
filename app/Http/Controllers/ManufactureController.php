<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblManufactureBrand;
use App\Http\Controllers\TblManufectureBrand;
use DB;

class ManufactureController extends Controller
{
   
    public function index()
    {
        $this->AuthCheckfun();
       return view('admin.add_manufacture');
    }
    public function all_manufacture()
    {
         $this->AuthCheckfun();
        $datas =TblManufactureBrand::all();

       return view('admin.all_manufacture',['datas'=>$datas]);
    }


    public function active(Request $request, $id)
    {
         DB::table('tbl_manufacture_brands')
       ->where('manufacture_id',$id)
       ->update(['publication_status'=>1]);
       return redirect('/all_manufacture')->with('response','Category Actived successfully');
        
    }
     public function inactive( Request $request, $id)
    {
       DB::table('tbl_manufacture_brands')
       ->where('manufacture_id',$id)
       ->update(['publication_status'=>0]);
       return redirect('/all_manufacture')->with('response','Category Inactived successfully');

    }
    public function edit_menufacture($id)
    {
        $this->AuthCheckfun();
       $data= DB::table('tbl_manufacture_brands')
       ->where('manufacture_id',$id)
       ->first(); 
       return view('admin.edit_manufacture',['data'=>$data]);
    }
    public function delete($id)
    {

    }
    

    public function update_manufacture(Request $request,$id)
    {
      


        
    $data=array();
    $data['manufacture_name']=$request->manufacture_name;
    $data['manufacture_description']=$request->manufacture_description;
      $data=DB::table('tbl_manufacture_brands')
    ->where('manufacture_id',$id)
    ->update($data);
    return redirect('/all_manufacture');
       
    }

    public function store(Request $request)
    {
         $this->validate($request,[
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
            'publication_status'=>'required',
            ]);
        

        $data = new TblManufactureBrand;       
        $data->manufacture_name=$request->input('manufacture_name');
        $data->manufacture_description=$request->input('manufacture_description');
        $data->publication_status=$request->input('publication_status');
         $data->save();
          return redirect('/add_manufacture')->with('response','Category added successfully');
    }

 
    public function delete_menufacture($id)
    {
         DB::table('tbl_manufacture_brands')
       ->where('manufacture_id',$id)
       ->delete(); 

        return redirect('/all_manufacture');
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
