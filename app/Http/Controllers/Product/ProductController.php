<?php

namespace App\Http\Controllers\Product;

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
use App\Models\Product\Product;
use App\Models\Wirehouse\Wirehouse;
class ProductController extends Controller
{
    public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'product.';
    }

    public function productIndex(){

    	$wirehouses = Wirehouse::all();
    	
    	$products = Product::join('wirehouses','wirehouses.wirehouse_id','=','products.wirehouse_id')
    	->get();

       


    	return view('product.product',compact('wirehouses','products'));
    }

     public function saveProduct(Request $request){

    	$this->validate($request,[
    		'wirehouse_id' => 'required',
    		'product_name' => 'required',
    		'product_code' => 'required',
    		'product_weight' => 'required',
    		'product_unit' => 'required',
    		'product_want' => 'required',
    		'product_rate' => 'required',
    		'product_mrp' => 'required',
    		'product_description' => 'required'

    	]);

    	$data = new Product();
    	$data->wirehouse_id = $request->wirehouse_id;
    	$data->product_name = $request->product_name;
    	$data->product_code = $request->product_code;
    	$data->product_weight = $request->product_weight;
    	$data->product_unit = $request->product_unit;
    	$data->product_want = $request->product_want;
    	$data->product_rate = $request->product_rate;
    	$data->product_mrp = $request->product_mrp;
    	$data->product_description = $request->product_description;
    	$data->save();

    	 // echo "<pre>";
      //   print_r($data);
      //   exit(); 

    	 return redirect()->route('product')
                        ->with('success','Product created successfully.');
    }

    public function editProduct($productId)
    {
        // echo $purchaseId;
        // exit();
        $products = Product::where('product_id',$productId)->first();
        // echo "<pre>";
        // print_r($purchase);
        // exit();

        $wirehouses = Wirehouse::get([
            'wirehouses.*'
        ]); 

        return view($this->view_page_url.'product-edit',compact('products','wirehouses'));

    }

    
    public function updateProduct(Request $request,$productId)
    {
        //return $request->all();

        try{
            $updateProduct = Product::where('product_id',$productId)
            ->update([



                'wirehouse_id' => $request->wirehouse_id,
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_weight' => $request->product_weight,
                'product_unit' => $request->product_unit,
                'product_want' => $request->product_want,
                'product_rate' => $request->product_rate,
                'product_mrp' => $request->product_mrp,
                'product_description' => $request->product_description
                

                ]);
           if($updateProduct){
                Session::flash('success','Product Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('product');
       
    }

     public function deleteProduct($productId)
    {
        try{
             $product = Product::where('product_id',$productId)
                ->delete();
            if($product){
                Session::flash('success','Product Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('product');
       
    }


    

} 
