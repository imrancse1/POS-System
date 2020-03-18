<?php

namespace App\Http\Controllers\Wirehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use App\User;
use App\Models\Wirehouse\Wirehouse;
use DB;
use Auth;
use File;
use Redirect,Response,Config;
use DataTables;
use Image;
class WirehouseController extends Controller
{
    public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'wirehouse.';
    }

    public function wirehouseIndex(){
        $wirehouses = Wirehouse::all();
    	return view('wirehouse.wirehouse',compact('wirehouses'));
    }

    public function saveWirehouse(Request $request){

    	$this->validate($request,[
    		'wirehouse_name' => 'required',
    		'wirehouse_address' => 'required',
    		'wirehouse_discription' => 'required'

    	]);

    	$data = new Wirehouse();
    	$data->wirehouse_name = $request->wirehouse_name;
    	$data->wirehouse_address = $request->wirehouse_address;
    	$data->wirehouse_discription = $request->wirehouse_discription;
    	$data->save();

    	 return redirect()->route('wirehouse')
                        ->with('success','Wirehouse created successfully.');
    }

    public function editWirehouse($wirehouseId)
    {
         $wirehouses = Wirehouse::where('wirehouse_id',$wirehouseId)->first();
        //return $suppliers;

        //exit();        
                
        return view($this->view_page_url.'wirehouse-edit',compact('wirehouses'));
    }

    public function updateWirehouse(Request $request,$wirehouseId)
    {
        //return $request->all();

        try{
            $updateWirehouses = Wirehouse::where('wirehouse_id',$wirehouseId)
            ->update([


                'wirehouse_name' => $request->wirehouse_name,
                'wirehouse_address' => $request->wirehouse_address,
                'wirehouse_discription' => $request->wirehouse_discription
                

                ]);
           if($updateWirehouses){
                Session::flash('success','Wirehouse Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('wirehouse');
       
    }

    public function deleteWirehouse($wirehouseId)
    {
        try{
             $wirehouse = Wirehouse::where('wirehouse_id',$wirehouseId)
                ->delete();
            if($wirehouse){
                Session::flash('success','Wirehouse Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('wirehouse');
       
    }


    

} 
