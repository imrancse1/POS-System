<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use App\User;
use App\Models\Vendor\Vendor;
use DB;
use Auth;
use File;
use Redirect,Response,Config;
use DataTables;
use Image;
class VendorController extends Controller
{
     public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'vendor.';
    }

    public function vendorIndex(){
        $vendors = Vendor::all();
        return view('vendor.vendor',compact('vendors'));
    }

     public function saveVendor(Request $request){

        $this->validate($request,[
            'vendor_name' => 'required',
            'vendor_phone' => 'required',
            'vendor_address' => 'required',
            'code' => 'required',
            'vendor_area' => 'required',
            'vendor_zone' => 'required',
            'vendor_target_set_month' => 'required',
            'vendor_target_set_yearly' => 'required',
            'vendor_total_month_report' => 'required',
            'credit' => 'required',
            'set_commission' => 'required',
            'opening_account' => 'required'

        ]);

        $data = new Vendor();
        $data->vendor_name = $request->vendor_name;
        $data->vendor_phone = $request->vendor_phone;
        $data->vendor_address = $request->vendor_address;
        $data->code = $request->code;
        $data->vendor_area = $request->vendor_area;
        $data->vendor_zone = $request->vendor_zone;
        $data->vendor_target_set_month = $request->vendor_target_set_month;
        $data->vendor_target_set_yearly = $request->vendor_target_set_yearly;
        $data->vendor_total_month_report = $request->vendor_total_month_report;
        $data->credit = $request->credit;
        $data->set_commission = $request->set_commission;
        $data->opening_account = $request->opening_account;
        $data->save();

         return redirect()->route('vendor')
                        ->with('success','Vendor created successfully.');
    }

   

    public function editVendor($vendorId)
    {
         $vendors = Vendor::where('vendor_id',$vendorId)->first();
        //return $suppliers;

        //exit();        
                
        return view($this->view_page_url.'vendor-edit',compact('vendors'));
    }

    public function updateVendor(Request $request,$vendorId)
    {
        //return $request->all();

        try{
            $updateVendor = Vendor::where('vendor_id',$vendorId)
            ->update([
                
                'vendor_name' => $request->vendor_name,
                'vendor_phone' => $request->vendor_phone,
                'vendor_address' => $request->vendor_address,
                'code' => $request->code,
                'vendor_area' => $request->vendor_area,
                'vendor_zone' => $request->vendor_zone,
                'vendor_target_set_month' => $request->vendor_target_set_month,
                'vendor_target_set_yearly' => $request->vendor_target_set_yearly,
                'vendor_total_month_report' => $request->vendor_total_month_report,
                'credit' => $request->credit,
                'set_commission' => $request->set_commission,
                'opening_account' => $request->opening_account,
                

                ]);
           if($updateVendor){
                Session::flash('success','Vendor Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('vendor');
       
    }

     public function deleteVendor($vendorId)
    {
        try{
             $vendor = Vendor::where('vendor_id',$vendorId)
                ->delete();
            if($vendor){
                Session::flash('success','Vendor Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('vendor');
       
    }


} 
