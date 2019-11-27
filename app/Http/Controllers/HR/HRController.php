<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use App\Models\Settings\Country;
use App\Models\Settings\Division;
use App\Models\Settings\City;
use App\Models\HR\PersonalInfo;
use App\Models\HR\PermanentAddress;
use App\Models\HR\PresentAddress;
use App\Models\HR\EmergencyCommunicationAddress;
use App\Models\HR\JobInfo;
use App\Models\HR\ExtraInfo;
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
class HRController extends Controller
{
    public $view_page_url;
    public function __construct()
    {
        $this->view_page_url = 'hr.employee.';
    }
    public function employeeDetails()
    {
        $countries = ['' => 'Please Select a Country'] +
            Country::where('status',1)
                ->pluck('country_name','country_id')
                ->all();

            $personalInforations = PersonalInfo::whereIn('status', [0,1])->get(); 

        return view($this->view_page_url.'employee',compact('countries','personalInforations'));
    }
//permanent
    public function permanentCountryWiseDivision($countryId)
    {
        return Division::where('status',1)
            ->where('country_id',$countryId)
            ->get();
    }


    public function permanentDivisionWiseCity($divisionId)
    {
        return City::where('status',1)
            ->where('division_id',$divisionId)
            ->get();
    }

    //present
     public function presentCountryWiseDivisionList($presentCountryId)
    {
        return Division::where('status',1)
            ->where('country_id',$presentCountryId)
            ->get();
    }
    public function presentDivisionWiseCityList($presentDivisionId)
    {
        return City::where('status',1)
            ->where('division_id',$presentDivisionId)
            ->get();
    }
    //Emergency
    public function emergencyCountryWiseDivisionList($emergencyCountryId)
    {
        return Division::where('status',1)
            ->where('country_id',$emergencyCountryId)
            ->get();
    }
    public function emergencyDivisionWiseCityList($emergencyDivisionId)
    {
        return City::where('status',1)
            ->where('division_id',$emergencyDivisionId)
            ->get();
    }

        public function savePersonalInfoDetails(Request $request)
    {
        //return $request->no_of_child;
        // return $request->file('image_path');
        // exit();
        $presentDate = Carbon::now();
        $dob = Carbon::parse($request->dob);
        $birthdayDiff = $presentDate->diff($dob);
        $birthDate = $birthdayDiff->format('%y.%m');
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        $diffBetweenTwoDates = $to->diff($from);
        $totalYearMonth = $diffBetweenTwoDates->format('%y.%m');

        $cardId = IdGenerator::generate(['table' => 'job_infos', 'length' => 9, 'prefix' =>date('182015')]);
        
        // return $id;
        // exit();
        DB::beginTransaction();
        try{
            $saveInfo = PersonalInfo::insertGetId([
                'name' => $request->name,
                'mobile_number' => $request->mobile_number,
                'father_name' => $request->father_name,
                'father_mobile_number' => $request->father_mobile_number,
                'mother_name' => $request->mother_name,
                'mother_mobile_number' => $request->mother_mobile_number,
                'education_qualification' => $request->education_qualification,
                'religion' => $request->religion,
                'dob' => date('Y-m-d',strtotime($request->dob)),
                'total_year' => $birthDate,
                'national_id' => $request->national_id,
                'marital_status' => $request->marital_status,
                'no_of_child' => $request->no_of_child,
                'created_by'  => Auth::user()->id,
                'created_at'  => Carbon::now()
            ]);


            if($saveInfo){
                 //Image upload and update path at User
                if (strlen($request->file('image_path')) > 0) {
                    $folderPath = 'images/personal_image/';
                    $fileName = Helper::imageUploadRaw($saveInfo, $request->file('image_path'), $folderPath, 50, 75);
                    if ($fileName != null) {
                        $storeInfo = PersonalInfo::where('personal_info_id', $saveInfo)
                            ->update([
                                'image_path' => $fileName,
                                'updated_by' => Auth::user()->id
                            ]);
                    }
                }

                $saveJobInfo = JobInfo::insertGetId([
                    'personal_info_id' => $saveInfo,
                    //'job_card_no' => $request->job_card_no,
                    'job_card_no' => $cardId,
                    'job_designation' => $request->job_designation,
                    'job_joining_date' => date('Y-m-d',strtotime($request->job_joining_date)),
                    'job_section' => $request->job_section,
                    'job_reference_name' => $request->job_reference_name,
                    'j_mobile_no' => $request->j_mobile_no,
                    'job_factory_name' => $request->job_factory_name,
                    'job_exp_designation' => $request->job_exp_designation,
                    'from' => Carbon::parse($request->from),
                    'to' => Carbon::parse($request->to),
                    'total_year_job_exp' => $totalYearMonth,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => Auth::user()->id
                ]);

                $savePermanentAddress = PermanentAddress::insertGetId([
                    'personal_info_id' => $saveInfo,
                    'country_id' => $request->country_id,     
                    'division_id' => $request->division_id,     
                    'city_id' => $request->city_id,     
                    'permanent_village' => $request->village,     
                    'permanent_post_office' => $request->post_office,     
                    'permanent_upzila' => $request->up_zila,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id     
                ]);

                $savePermanentAddress = PresentAddress::insertGetId([
                    'personal_info_id' => $saveInfo,
                    'country_id' => $request->Present_country_id,     
                    'division_id' => $request->present_division_id,     
                    'city_id' => $request->present_city_id,     
                    'present_village' => $request->present_road,     
                    'present_post_office' => $request->present_post_office,     
                    'present_upzila' => $request->present_up_zila,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id     
                ]);

                $savePermanentAddress = EmergencyCommunicationAddress::insertGetId([
                    'personal_info_id' => $saveInfo,
                    'country_id' => $request->emergency_country_id,     
                    'division_id' => $request->emergency_division_id,     
                    'city_id' => $request->emergency_city_id,     
                    'emg_comm_village' => $request->emergency_village,     
                    'emg_comm_post_office' => $request->emergency_post_office,     
                    'emg_comm_upzila' => $request->emergency_up_zila,
                    'emg_comm_mob_number' => $request->emergency_mobile,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id     
                ]);

                $saveExtraInfo = ExtraInfo::insertGetId([
                    'personal_info_id' => $saveInfo,
                    'chairman_name' => $request->chairman_name,     
                    'chairman_m_number' => $request->chairman_m_number,     
                    'member_name' => $request->member_name,     
                    'member_m_number' => $request->member_m_number,     
                    'allegation_inthana' => $request->allegation_inthana,     
                    'give_reason' => $request->give_reason,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id     
                ]);

                if($saveExtraInfo && $request->allegation_inthana == 0){
                $updateExtraInfo = ExtraInfo::where('extra_info_id',                $saveExtraInfo)
                    ->update([
                        'give_reason' => 'No Complain',
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->id 
                    ]);
                }

                DB::commit();
                Session::flash('success', 'Personal Info Created Successfull');
            }else {
                DB::rollback();
                Session::flash('error','Something Went Wrong');
            }

        }catch(\Exception $e){
            DB::rollback();
            return $e;
            Session::flash('error',$e->errofInfo[2]);
        }
        return redirect()->route('hr.employee');
    }


    public function singleViewEmployee($id)
    {
        $employeeDetails = PersonalInfo::where('personal_info_id',$id)->first();
        // echo "<pre>";
        // print_r($employeeDetails->extraInformation);
        // echo "</pre>";
        // exit();
        return view('hr.employee.singleViewEmployee',compact('employeeDetails'));
    }

    public function updateStatus($modelReference, $action, $id)
    {
        $modelName = '';
        foreach (explode('-', $modelReference) as $value) {
            $modelName .= ucwords($value);
        }
        $filterColumn = implode('_', explode('-', $modelReference)) . '_id';
        $modelPath = 'App\Models\HR\\' . $modelName;
        $model = new $modelPath();

        // $STATUS = ($action == 'active') ? 1: 0;

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

    //Edit panel
     public function employeeEdit($id)
    {
         $employeeDetails = PersonalInfo::where('personal_info_id',$id)->first();
         $countries = Country::where('status',1)->get();
                
        return view($this->view_page_url.'employeeEdit',compact('employeeDetails','countries'));
    }

    public function updateEmployeeInfo(Request $request,$personalInfoId)
    {
        // return $request->all();
        // exit();
        $findEmployeeData = PersonalInfo::where('personal_info_id',$personalInfoId)->first();

        if($findEmployeeData){
                $presentDate = Carbon::now();
                $dob = Carbon::parse($request->dob);
                $birthdayDiff = $presentDate->diff($dob);
                $birthDate = $birthdayDiff->format('%y.%m');
                $from = Carbon::parse($request->from);
                $to = Carbon::parse($request->to);
                $diffBetweenTwoDates = $to->diff($from);
                $totalYearMonth = $diffBetweenTwoDates->format('%y.%m');

           DB::beginTransaction();
           try{
                $updateInfo = PersonalInfo::where('personal_info_id',$findEmployeeData->personal_info_id)
                ->update([
                'name' => $request->name,
                'mobile_number' => $request->mobile_number,
                'father_name' => $request->father_name,
                'father_mobile_number' => $request->father_mobile_number,
                'mother_name' => $request->mother_name,
                'mother_mobile_number' => $request->mother_mobile_number,
                'education_qualification' => $request->education_qualification,
                'religion' => $request->religion,
                'dob' => date('Y-m-d',strtotime($request->dob)),
                'total_year' => $birthDate,
                'national_id' => $request->national_id,
                'marital_status' => $request->marital_status,
                'no_of_child' => $request->no_of_child,
                'updated_by'  => Auth::user()->id,
                'updated_at'  => Carbon::now()
            ]);

            if($updateInfo){
                if($updateInfo && $request->marital_status == 0){
                    $updateExtraInfo = PersonalInfo::where('personal_info_id',$findEmployeeData->personal_info_id)
                    ->update([
                        'no_of_child' => 0,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->id 
                    ]);
                }
                //Image upload and update path at User
              if($request->hasFile('image_path')){
                    $pimage = $request->file('image_path');
                    $fileName = $findEmployeeData->personal_info_id . '-' .time() . '.' .$pimage->getClientOriginalExtension();
                $img = Image::make($pimage)->resize(350, 350)->save(public_path('images/personal_image/' . $fileName));
                if($fileName != null){
                    $updateUserImage = PersonalInfo::where('personal_info_id',$findEmployeeData->personal_info_id)
                        ->update([
                            'image_path' => $fileName,
                            'updated_at'    => Carbon::now(),
                            'updated_by'    => Auth::user()->id
                        ]);
                   }
                if ($findEmployeeData->image_path != $fileName) {
                $oldImagePath = 'images/personal_image/'.$findEmployeeData->image_path;
                File::delete(public_path($oldImagePath));
                    }       
                }

                $updateJobInfo = JobInfo::where('personal_info_id',$findEmployeeData->personal_info_id)
                ->update([
                    'personal_info_id' => $findEmployeeData->personal_info_id,
                    // 'job_card_no' => $request->job_card_no,
                    'job_designation' => $request->job_designation,
                    'job_joining_date' => date('Y-m-d',strtotime($request->job_joining_date)),
                    'job_section' => $request->job_section,
                    'job_reference_name' => $request->job_reference_name,
                    'j_mobile_no' => $request->j_mobile_no,
                    'job_factory_name' => $request->job_factory_name,
                    'job_exp_designation' => $request->job_exp_designation,
                    'from' => Carbon::parse($request->from),
                    'to' => Carbon::parse($request->to),
                    'total_year_job_exp' => $totalYearMonth,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id
                ]);

                $updatePermanentAddress = PermanentAddress::where('personal_info_id',$findEmployeeData->personal_info_id)
                ->update([
                    'personal_info_id' => $findEmployeeData->personal_info_id,
                    'country_id' => $request->permanent_country_id,     
                    'division_id' => $request->permanent_division_id,     
                    'city_id' => $request->permanent_city_id,     
                    'permanent_village' => $request->village,     
                    'permanent_post_office' => $request->post_office,     
                    'permanent_upzila' => $request->up_zila,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id     
                ]);

                $updatePresentAddress = PresentAddress::where('personal_info_id',$findEmployeeData->personal_info_id)
                ->update([
                    'personal_info_id' => $findEmployeeData->personal_info_id,
                    'country_id' => $request->present_country_id,     
                    'division_id' => $request->present_division_id,     
                    'city_id' => $request->present_city_id,     
                    'present_village' => $request->present_road,     
                    'present_post_office' => $request->present_post_office,     
                    'present_upzila' => $request->present_up_zila,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id   
                ]);

                $updateEmgAddress = EmergencyCommunicationAddress::where('personal_info_id',$findEmployeeData->personal_info_id)
                ->update([
                    'personal_info_id' => $findEmployeeData->personal_info_id,
                    'country_id' => $request->emergency_country_id,     
                    'division_id' => $request->emergency_division_id,     
                    'city_id' => $request->emergency_city_id,     
                    'emg_comm_village' => $request->emergency_village,     
                    'emg_comm_post_office' => $request->emergency_post_office,     
                    'emg_comm_upzila' => $request->emergency_up_zila,
                    'emg_comm_mob_number' => $request->emergency_mobile,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id    
                ]);

                $updateExtraInfo = ExtraInfo::where('personal_info_id',$findEmployeeData->personal_info_id)
                ->update([
                    'personal_info_id' => $findEmployeeData->personal_info_id,
                    'chairman_name' => $request->chairman_name,     
                    'chairman_m_number' => $request->chairman_m_number,     
                    'member_name' => $request->member_name,     
                    'member_m_number' => $request->member_m_number,     
                    'allegation_inthana' => $request->allegation_inthana,     
                    'give_reason' => $request->give_reason,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id     
                ]);

                if($updateExtraInfo && $request->allegation_inthana == 0){
                $updateExtraInfo = ExtraInfo::where('personal_info_id',$findEmployeeData->personal_info_id)
                    ->update([
                        'give_reason' => 'No Complain',
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->id 
                    ]);
                }
                DB::commit();
                Session::flash('success','Personal Info Updated Successfull');
               
            }else {
                DB::rollback();
                Session::flash('error','Something Went Wrong');
            }

           }catch(\Exception $e){
            DB::rollback();
            return $e;
            Session::flash('error',$e->errofInfo[2]);
        }    
    }
        
     return redirect()->route('hr.employee');
    }

    public function employeeReports(Request $request)
    {
        //return $request->all();
        $name = $request->name;
        $email = $request->email;
        if($request->name && $request->email){
            $name = $request->name;
            $email = $request->email;
        }
        return view('hr.employee.employeeReports',compact('name','email'));
    }

    public function getTestEmployeeReports(Request $request)
    {
        // return $request->all();
        if(isset($request->name) && isset($request->email)){
            $model = User::orderBy('id','ASC')
                ->where('name','like','%'.$request->name.'%')       
                ->where('email','like','%'.$request->email.'%')       
                ->get(); 
        }else if(isset($request->name)){
            $model = User::orderBy('id','ASC')
                ->where('name','like','%'.$request->name.'%')       
                ->get(); 
        }else if(isset($request->email)){
            $model = User::orderBy('id','ASC')
                ->where('email','like','%'.$request->email.'%')       
                ->get(); 
        }else{
            $model = [];
            //$model = User::orderBy('id','ASC')->get();
        }
        // dd($model);
         return Datatables::of($model)
            ->editColumn('status', function ($user) {
                $html = '';
                $html .= "<label class='label label-warning'";
                if ($user->status == 1) {
                    $html .= "style='display:none'";
                }
                $html .= ">Inactive</label>";

                $html .= "<label class='label label-success'";
                if ($user->status == 0) {
                    $html .= "style='display:none'";
                }
                $html .= ">Completed</label>";
                return $html;
            })
            ->addColumn('action', function ($user) {
                $html = '<a href="#" class="btn btn-xs btn-primary"> Edit </a>';
                return $html;
            })
            ->rawColumns(['id','name','email','status', 'action'])
            ->make();
        return view('hr.employee.employeeReports');    
    }

    public function searchAutoComplete(Request $request)
    {
          $search = $request->get('term');
      
          $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 

   //================@@ User Panel Start @@===============

    public function userList()
    {
        $users = User::whereIn('status', [1,0])->get();
        return view('hr.user.user',compact('users'));
    }

    public function saveUser(Request $request)
    {
        //return $request->all();
        DB::beginTransaction();
        try {
            $saveUser = User::insertGetId([
                'full_name' => $request->full_name,
                'name' => $request->user_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'user_type' => $request->user_type,
                'mobile_no' => $request->mobile_no,
                //'dob' => date('Y-m-d', strtotime($request->dob)),
                'dob' => Carbon::parse($request->dob),
                'gender' => $request->gender,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => $request->_token,
                'created_at'     => Carbon::now(),
                'created_by'     => Auth::user()->id
            ]);
           if($saveUser){
                 if ($request->hasFile('p_image')) {
                    $pimage = $request->file('p_image');
                    $p_image_name = $saveUser. '-' .time() . '.' . $pimage->getClientOriginalExtension();
                    // $p_image_name = uniqid('id_') . '.' . $pimage->getClientOriginalExtension();
                    Image::make($pimage)->resize(350, 350)->save(public_path('images/user_image/' . $p_image_name));
                if($p_image_name != null){
                        $uploadImage = User::where('id',$saveUser)
                            ->update([
                                'profile_image' => $p_image_name,
                                'updated_by'    => Auth::user()->id
                            ]);
                }    
            }
                DB::commit();
                Session::flash('success', 'User Created Successfully !!');
           } else {
                DB::rollback();
                Session::flash('error', 'Something Went Wrong !!');
           }
        }catch(\Exception $e){
            DB::rollback();
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('hr.user');
    }

    public function updateUserStatus($modelReference,$action,$userId)
    {
        DB::beginTransaction();
        try {
            $userStatus = User::where('id',$userId)
                ->update([
                    'status' => Helper::getStatus($action),
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id
                ]);
            if($userStatus){
                DB::commit();
                return response()->json(['success' => true, 'message' => ucwords($action) . ' Successfull !!']);
            }else{
                DB::rollback();
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
            }    
        }catch(\Exception $e){
            //return $e;
            DB::rollback();
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    public function editUser($userId)
    {
        //return $userId;
        $user = User::where('id',$userId)->first();
        return view('hr.user.editUser',compact('user'));
    }

    public function updateUser(Request $request, $userId)
    {
        $findUser = User::where('id',$userId)->first();
        if($findUser){
            DB::beginTransaction();
        try {
            $updateUser = User::where('id', $findUser->id)
                ->update([
                'full_name' => $request->full_name,
                'name' => $request->user_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'user_type' => $request->user_type,
                'mobile_no' => $request->mobile_no,
                //'dob' => date('Y-m-d', strtotime($request->dob)),
                'dob' => Carbon::parse($request->dob),
                'gender' => $request->gender,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'updated_at'     => Carbon::now(),
                'updated_by'     => Auth::user()->id
                ]);

             if($updateUser){
                if($request->hasFile('p_image')){
                    $pimage = $request->file('p_image');
                    $fileName = $findUser->id . '-' .time() . '.' .$pimage->getClientOriginalExtension();
                $img = Image::make($pimage)->resize(350, 350)->save(public_path('images/user_image/' . $fileName));
                if($fileName != null){
                    $updateUserImage = User::where('id',$findUser->id)
                        ->update([
                            'profile_image' => $fileName,
                            'updated_at'    => Carbon::now(),
                            'updated_by'    => Auth::user()->id
                        ]);
                   }
                if ($findUser->profile_image != $fileName) {
                $oldImagePath = 'images/user_image/'.$findUser->profile_image;
                File::delete(public_path($oldImagePath));
                    }       
                }
                DB::commit();
                Session::flash('success','User Updated Successfull !!!');
             }else {
                DB::rollback();
                Session::flash('error','Something Went Wrong !!!');
             }   
        }catch(\Exception $e){
            return $e;
            DB::rollback();
            Session::flash('error', $e->errorInfo[2]);
        }
        }
        return redirect()->route('hr.user');
    }

    //===============@@ User Panel End @@=================


    //===============@@ Search Panel Start @@=================
   public function searchAction(Request $request)
    {
     if($request->ajax())
     {

      //$data = PersonalInfo::join()
      return  PersonalInfo::join('job_infos','job_infos.personal_info_id','=','personal_infos.personal_info_id')
      ->search($request->get('search'))
      ->get([
        'personal_infos.personal_info_id',
        'personal_infos.name',
        'personal_infos.mobile_number',
        'personal_infos.education_qualification',
        'personal_infos.religion',
        'personal_infos.dob',
        'personal_infos.marital_status',
        'personal_infos.dob',
        'personal_infos.image_path',
        'personal_infos.status',
        'job_infos.job_info_id',
        'job_infos.job_designation',
    ]);
     }
    }
    //===============@@ Search Panel End @@=================

    // //==================@@ TestAjax Controller Panel Start @@=================
    // public function deletePersonalInfo($deleteId)
    // {
    //     // return 
    //     // exit();
    //     DB::beginTransaction();
    //     try {
    //         $userStatus = PersonalInfo::where('personal_info_id',$deleteId)
    //             ->delete();   
    //         if($userStatus){
    //             return response()->json(['success' => true, 'message' => ' Delete Successfull !!']);
    //         }else{
    //             return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
    //         }    
    //     }catch(\Exception $e){
    //         return $e;
    //         return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
    //     }
    // }

    // public function inactivePersonalInfo($inactiveId)
    // {
    //     try {
    //         $updateStatus= DB::table('personal_infos')
    //         ->where('personal_info_id',$inactiveId)
    //             ->update([
    //                 'status' => 0,
    //                 'updated_at'    => Carbon::now(),
    //                 'updated_by'    => Auth::user()->id
    //             ]);
    //         if($updateStatus){
    //             return response()->json(['success' => true, 'message' => ' Inactive Successfull !!']);
    //         }else{
    //             return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
    //         }   
    //     }catch(\Exception $e){
    //         return $e;
    //         return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
    //     }
          
        
    // }

    // public function activePersonalInfo($activeId)
    // {
    //     //return $activeId;
    //     try{
    //         $updateStatus = PersonalInfo::where('personal_info_id',$activeId)
    //                       ->update([
    //                         'status' => 1,
    //                         'updated_at'    => Carbon::now(),
    //                         'updated_by'    => Auth::user()->id
    //                       ]);  
    //          if($updateStatus){
    //                 return response()->json(['success' => true, 'message' => ' Active Successfull !!']);
    //          } else {
    //                 return response()->json(['success' => true, 'message' => ' Something Went Wrong !!']);
    //          }            
    //     }catch(\Exception $e){
    //         return $e;
    //         return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
    //     }
    // }
    // //==================@@ TestAjax Controller Panel End @@=================
    

} 
