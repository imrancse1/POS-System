<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use App\User;
use App\Models\Supplier\Supplier;
use DB;
use Auth;
use File;
use Redirect,Response,Config;
use DataTables;
use Image;
class SupplierController extends Controller
{
     public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'supplier.';
    }

    public function supplierIndex(){
        $suppliers = Supplier::all();
        return view('supplier.supplier',compact('suppliers'));
    }

     public function saveSupplier(Request $request){

        $this->validate($request,[
            'supplier_name' => 'required',
            'supplier_address' => 'required',
            'supplier_phone' => 'required'

        ]);

        $data = new Supplier();
        $data->supplier_name = $request->supplier_name;
        $data->supplier_address = $request->supplier_address;
        $data->supplier_phone = $request->supplier_phone;
        $data->save();

         return redirect()->route('supplier')
                        ->with('success','Supplier created successfully.');
    }

   

    public function editSupplier($supplierId)
    {
         $suppliers = Supplier::where('supplier_id',$supplierId)->first();
        //return $suppliers;

        //exit();        
                
        return view($this->view_page_url.'supplier-edit',compact('suppliers'));
    }

    public function updateSupplier(Request $request,$supplierId)
    {
        //return $request->all();

        try{
            $updateSupplier = Supplier::where('supplier_id',$supplierId)
            ->update([

                'supplier_name' => $request->supplier_name,
                'supplier_address' => $request->supplier_address,
                'supplier_phone' => $request->supplier_phone
                

                ]);
           if($updateSupplier){
                Session::flash('success','Supplier Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('supplier');
       
    }

     public function deleteSupplier($supplierId)
    {
        try{
             $supplier = Supplier::where('supplier_id',$supplierId)
                ->delete();
            if($supplier){
                Session::flash('success','Supplier Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('supplier');
       
    }



    

    

} 
