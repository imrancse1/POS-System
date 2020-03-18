<?php

namespace App\Http\Controllers\Inventory;

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
use DB;
use Auth;
use File;
use Redirect,Response,Config;
use DataTables;
use Image;
class InventoryController extends Controller
{
     public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'inventory.';
    }

    public function inventoryIndex(){

        $inventories = Inventory::join('products','products.product_id','=','inventories.product_id')
        ->join('wirehouses','wirehouses.wirehouse_id','=','inventories.wirehouse_id')
        ->join('suppliers','suppliers.supplier_id','=','inventories.supplier_id')
      
        ->get();

        $wirehouses = Wirehouse::all();
        // $products = Product::all();
        $suppliers = Supplier::all();
        
        
        return view('inventory.inventory',compact('inventories','wirehouses','suppliers'));
    }

    public function wirehouseWiseProduct($wirehouseId)
    {
        return Product::where('wirehouse_id',$wirehouseId)->get();
        // $vehicles = InputVehicle::where('category_id',$categoryId)->get();
        // $html = '';
        // foreach ($vehicles as $vehicle) {
        //     $html.="<option value='".$vehicle->input_vehicle_id."'>".$vehicle->vehicle_name."</option>";
        // }
        // echo $html;
    }
     public function editWirehouseWiseProduct($wirehouseId)
    {
        return Product::where('wirehouse_id',$wirehouseId)->get();
        // $vehicles = InputVehicle::where('category_id',$categoryId)->get();
        // $html = '';
        // foreach ($vehicles as $vehicle) {
        //     $html.="<option value='".$vehicle->input_vehicle_id."'>".$vehicle->vehicle_name."</option>";
        // }
        // echo $html;
    }


    // public function productWiseInventoryQuantity($productId)
    // {
    //     return Product::where('product_id',$productId)->get();
    // }
    // public function productWiseStock($productId)
    // {
    //     return Product::where('product_id',$productId)->get();
    // }


     public function saveInventory(Request $request){

        $this->validate($request,[
            'wirehouse_id' => 'required',
            'product_id' => 'required',
            'supplier_id' => 'required',
            'inventory_quantity' => 'required',
            'stock_in' => 'required',
            'indentory_description' => 'required'

        ]);

        $data = new Inventory();
        $data->wirehouse_id = $request->wirehouse_id;
        $data->product_id = $request->product_id;
        $data->supplier_id = $request->supplier_id;
        $data->inventory_quantity = $request->inventory_quantity;
        $data->stock_in = $request->stock_in;
        $data->indentory_description = $request->indentory_description;
        $data->save();

         return redirect()->route('inventory')
                        ->with('success','Inventory created successfully.');
    }

   

    public function editInventory($inventoryId)
    {
         $inventorys = Inventory::where('inventory_id',$inventoryId)->first();
        // return $inventorys;

        // exit(); 

        $wirehouses = Wirehouse::get([
            'wirehouses.*'
        ]); 
        $suppliers = Supplier::get([
            'suppliers.*'
        ]);  

         $products = Product::get([
            'products.*'
        ]);      
                
        return view($this->view_page_url.'inventory-edit',compact('inventorys','wirehouses','suppliers','products'));
    }

    public function updateInventory(Request $request,$inventoryId)
    {
        //return $request->all();

        try{
            $updateInventory = Inventory::where('inventory_id',$inventoryId)
            ->update([

                'wirehouse_id' => $request->wirehouse_id,
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier_id,
                'inventory_quantity' => $request->inventory_quantity,
                'stock_in' => $request->stock_in,
                'indentory_description' => $request->indentory_description
                

                ]);
           if($updateInventory){
                Session::flash('success','Inventory Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('inventory');
       
    }

     public function deleteInventory($inventoryId)
    {
        try{
             $inventory = Inventory::where('inventory_id',$inventoryId)
                ->delete();
            if($inventory){
                Session::flash('success','Inventory Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('inventory');
       
    }



    

    

} 
