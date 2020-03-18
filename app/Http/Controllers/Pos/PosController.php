<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use App\User;
use App\Models\Inventory\Inventory;
use App\Models\Wirehouse\Wirehouse;
use App\Models\Supplier\Supplier;
use App\Models\Product\Product;
use App\Models\Employee\Employee;
use App\Models\Vendor\Vendor;
use App\Models\Pos\Pos;
use DB;
use Auth;
use File;
use Redirect,Response,Config;
use DataTables;
use Image;
class PosController extends Controller
{
    public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'pos.';
    }

    public function pos()
    {
        $vendors = Vendor::get([
                        'vendors.vendor_id',
                        'vendors.vendor_name'
                    ]);

         $products = Product::get([
                        'products.product_id',
                        'products.wirehouse_id',
                        'products.product_name'
                    ]);
         $product = Product::first([
                        'products.product_id',
                        'products.wirehouse_id',
                        'products.product_name'
                    ]);
         $result = [];
         foreach ($products as $key => $product) {
           
         $result[] =  Product::join('inventories','inventories.product_id','=','products.product_id')
         ->where('products.product_id',$product->product_id)
         ->get([
                'products.product_id',
                'products.product_name',
                'inventories.inventory_quantity',
            ]);
        }

        $poses = Pos::join('products','products.product_id','=','pos.product')
        ->join('vendors','vendors.vendor_id','=','pos.vendor_id')
         ->join('employees','employees.employee_id','=','pos.employee_id')
         ->join('wirehouses','wirehouses.wirehouse_id','=','pos.wirehouse_id')
        
        ->get([
            'pos.*',
            'products.product_name',
            'vendors.vendor_name',
            'employees.employee_name',
            'wirehouses.*'
            
        ]);
        
        // echo "<pre>";
        // print_r($poses);
        // exit();
         
        return view($this->view_page_url.'pos',compact('vendors','products','result','poses'));
    }



    public function vendorWiseEmployeeName($vendorId)
    {
         $employee = Employee::where('vendor_id',$vendorId)
                         ->get([
                            'employees.employee_id',
                            'employees.vendor_id',
                            'employees.employee_name'
                           ]);
               return $employee;          
    }

     public function productWiseWirehouse($productId)
    {
         return Wirehouse::join('products','products.wirehouse_id','=','wirehouses.wirehouse_id')
                        ->join('inventories','inventories.product_id','=','products.product_id')    
                         ->where('products.product_id',$productId)
                         ->get([
                            'products.product_id',
                            'products.product_name',
                            'wirehouses.wirehouse_id',
                            'wirehouses.wirehouse_name'
                           ]);
         
    }

    public function productWiseRate($productId)
    {
        
        $results =  Product::where('products.product_id',$productId)
         ->get([
                'products.product_id',
                'products.product_rate',
                
            ]);
         foreach ($results as $key => $result) {
            $productRate = $result->product_rate;
         }

         echo $productRate;
    }

    
    public function productWiseQuantity($productId)
    {
        
        $results =  Product::join('inventories','inventories.product_id','=','products.product_id')
        ->where('products.product_id',$productId)
         ->get([
                'products.product_id',
                'products.product_name',
                'inventories.inventory_quantity',
                
            ]);
         foreach ($results as $key => $result) {
            $productQuantity = $result->inventory_quantity;
         }

         echo $productQuantity;
    }

    public function savePos(Request $request)
    {
        // return request()->all();
        // exit();
        DB::beginTransaction();
        try{
            $savePos = Pos::insertGetId([
                'vendor_id' => $request->vendor_id,
                'employee_id' => $request->employee_id,
                'product' => $request->product_name,
                'wirehouse_id' => $request->wirehouse_id,
                'product_quantity' => $request->product_quantity,
                'product_rate' => $request->product_rate,
                'total_amount' => $request->total_amount,
                'reference' => $request->reference,
                'description' => $request->description,
                'created_by'   => 1
            ]);

            if($savePos){
                DB::commit();
                Session::flash('success','Save Successfully');
            }else{
                DB::rollback();
                Session::flash('error','Something Went Wrong!!');
            }
        }catch(\Exception $e){
            //return $e;
            DB::rollback();
            Session::flash('error',$e->errorInfo[2]);
        }

        return redirect()->route('pos');
    }


    public function deletePos($posId)
    {
        try{
             $pos = Pos::where('pos_id',$posId)
                ->delete();
            if($pos){
                Session::flash('success','Pos Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('pos');
       
    }

    

    

} 
