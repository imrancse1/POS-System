<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use App\User;
use DB;
use Auth;
use File;
use Redirect,Response,Config;
use DataTables;
use Image;
use App\Models\Employee\Employee;
use App\Models\Vendor\Vendor;
class EmployeeController extends Controller
{
    public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'employee.';
    }

    public function employeeIndex(){

    	
    	
    	$employees = Employee::join('vendors','vendors.vendor_id','=','employees.vendor_id')
    	->get();

       $vendors = Vendor::all();


    	return view('employee.employee',compact('vendors','employees'));
    }

    public function areaWiseZone($vendorId)
    {
        return Vendor::where('vendor_id',$vendorId)->get();
    }
    public function editAreaWiseZone($vendorId)
    {
        return Vendor::where('vendor_id',$vendorId)->get();
    }

     public function saveEmployee(Request $request){

    	$this->validate($request,[
    		'vendor_id' => 'required',
    		'employee_name' => 'required',
    		'employee_phone' => 'required',
    		'employee_code' => 'required',
    		'employee_zone' => 'required',
    		'employee_designation' => 'required',
    		'employee_target_set' => 'required',
    		'employee_sales_history' => 'required'
    		

    	]);

    	$data = new Employee();
    	$data->vendor_id = $request->vendor_id;
    	$data->employee_name = $request->employee_name;
    	$data->employee_phone = $request->employee_phone;
    	$data->employee_code = $request->employee_code;
    	$data->employee_zone = $request->employee_zone;
    	$data->employee_designation = $request->employee_designation;
    	$data->employee_target_set = $request->employee_target_set;
    	$data->employee_sales_history = $request->employee_sales_history;
    	$data->save();

    	 // echo "<pre>";
      //   print_r($data);
      //   exit(); 

    	 return redirect()->route('employee')
                        ->with('success','Employee created successfully.');
    }

    public function editEmployee($employeeId)
    {
        // echo $purchaseId;
        // exit();

        $employee = Employee::where('employee_id',$employeeId)->first();
        // echo "<pre>";
        // print_r($employee);
        // exit();

        $vendors = Vendor::get([
            'vendors.*'
        ]); 

        return view($this->view_page_url.'employee-edit',compact('employee','vendors'));

    }

    
    // public function updateProduct(Request $request,$productId)
    // {
    //     //return $request->all();

    //     try{
    //         $updateProduct = Product::where('product_id',$productId)
    //         ->update([



    //             'wirehouse_id' => $request->wirehouse_id,
    //             'product_name' => $request->product_name,
    //             'product_code' => $request->product_code,
    //             'product_weight' => $request->product_weight,
    //             'product_unit' => $request->product_unit,
    //             'product_want' => $request->product_want,
    //             'product_rate' => $request->product_rate,
    //             'product_mrp' => $request->product_mrp,
    //             'product_description' => $request->product_description
                

    //             ]);
    //        if($updateProduct){
    //             Session::flash('success','Product Updated successfully!!!');
    //        }else {
    //             Session::flash('error','Something Went Wrong!!!');
    //        } 
    //     }catch(\Exception $e){
    //         //return $e;
    //         Session::flash('error',$e->errorInfo[2]);
    //     }
    //     return redirect()->route('product');
       
    // }

     public function deleteEmployee($employeeId)
    {
        try{
             $employee = Employee::where('employee_id',$employeeId)
                ->delete();
            if($employee){
                Session::flash('success','Employee Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('employee');
       
    }
   

} 

