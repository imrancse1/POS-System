<?php

namespace App\Http\Controllers\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use App\Models\Settings\Country;
use App\Models\Settings\Division;
use App\Models\Settings\City;
use Session;
use DB;
use Auth;
class SettingsController extends Controller
{
    public $view_page_url;
    public function __construct()
    {
    	$this->view_page_url = 'settings.setup.';
    }
    public function setup()
    {
    	return view($this->view_page_url.'setup');
    }

    public function addCountry()
    {
    	return view($this->view_page_url.'country.addCountry');
    }

    public function saveCountry(Request $request)
    {
    	//return $request->all();
    	try{
    		foreach ($request->country_name as $country) {
    			$saveCountry = Country::insertGetId([
    			'country_name' => $country,
    			'created_by'   => Auth::user()->id,
    			'created_at'   => date('Y-m-d H:i:s')
    		]);
    	}
    		
    		if($saveCountry){
    			Session::flash('success','Country Added Successfully !!');
    		}else {
    			Session::flash('error','Something Went Wrong !!');
    		}
    	}catch(\Exception $e){
    		return $e;
    		Session::flash('error', $e->errorInfo[2]);
    	}
    	return redirect()->route('settings.setup');
    	
    }

    public function viewCountry()
    {
        $countries = Country::whereIn('status', [0,1])->get();
        return view($this->view_page_url.'country.viewCountry',compact('countries'));
    }

   public function updateStatus($modelReference, $action, $id)
    {
        $modelName = '';
        foreach (explode('-', $modelReference) as $value) {
            $modelName .= ucwords($value);
        }
        $filterColumn = implode('_', explode('-', $modelReference)) . '_id';
        $modelPath = 'App\Models\Settings\\' . $modelName;
        $model = new $modelPath();

        DB::beginTransaction();
        try {
            $result = $model::where($filterColumn, $id)
                ->update([
                    'status' => Helper::getStatus($action),
                    'updated_by' => Auth::user()->id,
                ]);
            if ($result) {
                DB::commit();
                return response()->json(['success' => true, 'message' => ucwords($action) . ' Successfull !']);
            } else {
                DB::rollBack();
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    public function updateSaveCountry(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'country_name' => 'required',
        ]);
        try {
            $updateCountry = Country::where('country_id', $request->country_id)
                ->update([
                    'country_name' => $request->country_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            if ($updateCountry) {
                return response()->json(['success' => true, 'message' => 'Update Successfull !']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
        }
    }

   //===============@@ Country Panel End @@===================

    //===============@@ Division Panel Start @@===================

    public function addDivision()
    {
        $countries = ['' => 'Please Select a Country'] +
            Country::where('status',1)
                ->pluck('country_name','country_id')
                ->all();       
        return view($this->view_page_url.'division.addDivision',compact('countries'));
    }

     public function saveDivision(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'country_name' => 'required',
            'division_name' => 'required',
        ]);
        try{
            foreach ($request->division_name as $division) {
                $saveDivision = Division::insertGetId([
                'country_id' => $request->country_name,
                'division_name' => $division,
                'created_by'   => Auth::user()->id,
                'created_at'   => date('Y-m-d H:i:s')
            ]);
        }
            
            if($saveDivision){
                Session::flash('success','Division Added Successfully !!');
            }else {
                Session::flash('error','Something Went Wrong !!');
            }
        }catch(\Exception $e){
            return $e;
            Session::flash('error', $e->errorInfo[2]);
        }
        return redirect()->route('settings.setup');
        
    }

    public function viewDivision()
    {
        $countries = ['' => 'Please Select a Country'] +
            Country::where('status',1)
                ->pluck('country_name','country_id')
                ->all();

        $divisions = Division::whereIn('status', [0,1])->get();
        return view($this->view_page_url.'division.viewDivision',compact('divisions','countries'));
    }

     public function saveUpdateDivision(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'country_name' => 'required',
            'division_name' => 'required',
        ]);

        try{
            DB::beginTransaction();
            $updateDivision = Division::where('division_id',$request->division_id)
                ->update([
                    'country_id'    =>$request->country_name,
                    'division_name' => $request->division_name,
                ]);
            if($updateDivision){
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Division Updated Successfully !!']);
            }else {
                DB::rollback();
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
            }    
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    //===============@@ Division Panel End @@===================

    //===============@@ City Panel Start @@===================

    public function addCity()
    {
        $countries = ['' => 'Please Select a Country'] +
            Country::where('status',1)
                ->pluck('country_name','country_id')
                ->all();       
        return view($this->view_page_url.'city.addCity',compact('countries'));
    }

    public function countryWiseDivisionList($countryId)
    {
        return Division::where('status',1)
            ->where('country_id',$countryId)
            ->get();
    }

    public function saveCity(Request $request)
    {
        $this->validate($request, [
            'country_name' => 'required',
            'division_name' => 'required',
            'city_name' => 'required'
        ]);

        try{
            foreach ($request->city_name as $key => $city)
            {
                $saveCity = City::insertGetId([
                'country_id' => $request->country_name,
                'division_id' => $request->division_name,
                'city_name' => $city,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::user()->id
            ]);
            }
            if($saveCity){
                Session::flash('success', 'City Added Successfully !!');
            }else {
                Session::flash('error', 'Something Went Wrong');
            }
        }catch(\Exception $e){
            return $e;
            Session::flash('error', $e->errorInfo[2]);
        }
        return redirect()->route('settings.setup');
    }

    public function viewCity()
    {
        $countries = ['' => 'Please Select Country'] +
                Country::where('status',1)
                    ->pluck('country_name','country_id')
                    ->all();
        $divisions = ['' => 'Please Select division'] +
                Division::where('status',1)
                    ->pluck('division_name','division_id')
                    ->all();            

        $cities = City::whereIn('status', [0,1])->get();
        // echo '<pre>';
        // print_r($cities->divisionList->countryList->country_name);
        // echo '</pre>';
        // exit();
        return view($this->view_page_url.'city.viewCity',compact('cities','countries','divisions'));
    }

    public function saveUpdateCity(Request $request)
    {
        // return $request->all();
        // exit();
        $this->validate($request, [
            'country_name' => 'required',
            'division_name' => 'required',
            'city_name'     => 'required',
        ]);

        try{
            DB::beginTransaction();
            $updateCity = City::where('city_id',$request->city_id)
                ->update([
                    'country_id'    =>$request->country_name,
                    'division_id'    =>$request->division_name,
                    'city_name' => $request->city_name,
                ]);
            if($updateCity){
                DB::commit();
                return response()->json(['success' => true, 'message' => 'City Updated Successfully !!']);
            }else {
                DB::rollback();
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
            }    
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    //===============@@ City Panel End @@===================

} 
