@extends('app')
@section('extra-css')
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard.css')}}">
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard_theme_arrows.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('public/assets/plugins/chosen/css/chosen.min.css')}}">
<style type="text/css">
   .select2-container--default .select2-selection--single,
   .select2-selection .select2-selection--single {
   width: 282px;
   }
</style>
@endsection
@section('content-header')
<section class="content-header">
   <h1>
      Employee Information
      <small>Edit Employee</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Employee</li>
   </ol>
</section>
@endsection
@section('main-content')
<!-- Main content -->
<section class="content">
   <!-- Custom Tabs -->
   <div class="box box-default">
      <div class="box-header with-border">
         <h3 class="box-title">
            <a href="{{route('hr.employee')}}" class="btn btn-info btn-md">
               <i class="fa fa-hand-o-left"></i>&nbsp;
               View Employee
            </a>
         </h3>
         <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
      </div>
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                        @if($employeeDetails)
                        <form action="{{route('hr.update-employee-info.post',$employeeDetails->personal_info_id)}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <!-- SmartWizard html -->
                           <div id="smartwizard" class="sw-main sw-theme-arrows">
                              <ul class="nav nav-tabs step-anchor">
                                 <li class="nav-item active"><a href="#step-1" class="nav-link">Step 1<br><small>Personal Information</small></a></li>
                                 <li class="nav-item"><a href="#step-2" class="nav-link">Step 2<br><small>Job Information</small></a></li>
                                 <li class="nav-item"><a href="#step-3" class="nav-link">Step 3<br><small>Address</small></a></li>
                                 <li class="nav-item"><a href="#step-4" class="nav-link">Step 4<br><small>Extra Information</small></a></li>
                              </ul>
                              <div class="sw-container tab-content" style="min-height: 152px;">
                                 <div id="step-1" class="tab-pane step-content" style="display: block;">
                                    <div id="form-step-0" role="form" data-toggle="validator">
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="name" class="col-md-2">Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="name" id="name" value="{{$employeeDetails->name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="mobile_number" class="col-md-2">Mobile Number :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="{{$employeeDetails->mobile_number}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="father_name" class="col-md-2">Father's Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="father_name" id="father_name" value="{{$employeeDetails->father_name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="f_mobile_number" class="col-md-2">Father's Mobile Number :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="father_mobile_number" id="father_mobile_number" value="{{$employeeDetails->father_mobile_number}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="mother_name" class="col-md-2">Mother's Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{$employeeDetails->mother_name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="m_mobile_number" class="col-md-2">Mother's Mobile Number :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="mother_mobile_number" id="mother_mobile_number" value="{{$employeeDetails->mother_mobile_number}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="edu_qualification" class="col-md-2">Education Qualification:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="education_qualification" id="education_qualification" value="{{$employeeDetails->education_qualification}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="religion" class="col-md-2">Religion :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="religion" id="religion" value="{{$employeeDetails->religion}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="dob" class="col-md-2">Date Of Birth:</label>
                                             <div class="col-sm-4">
                                                <input class="form-control datepicker" autocomplete="off" type="text" name="dob" id="dob" value="{{$employeeDetails->dob}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="nation_id" class="col-md-2">National/Birth Certificate Id:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="national_id" id="national_id" value="{{$employeeDetails->national_id}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="marital_status" class="col-md-2">Marital Status:</label>

                                             <div class="col-sm-4">
                                                <input type="radio" name="marital_status" class="reference_married" value="1" @if($employeeDetails->marital_status == 1) checked="" @endif> &nbsp;Married &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="marital_status" class="reference_unmarried" value="0" @if($employeeDetails->marital_status == 0) checked="" @endif> &nbsp;Unmarried
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          
                                             <label for="no_of_child" class="col-md-2">No of Child:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control " name="no_of_child" id="no_of_child" value="{{ $employeeDetails->no_of_child }}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          
                                             <label for="no_of_child" class="col-md-2" style="display: none;">No of Child:</label>
                                             <div class="col-sm-4" style="display: none;">
                                                <input type="text" class="form-control" value="0" readonly="">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          
                                             <label for="no_of_child" class="col-md-2">Current Image:</label>
                                             <div class="col-sm-4">
                                               <img src="{{URL::to('public/images/personal_image')}}/{{$employeeDetails->image_path}}" height="50px" width="50px">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          
                                             <label for="no_of_child" class="col-md-2">New Image:</label>
                                             <div class="col-sm-4">
                                               <input type="file" name="image_path" class="form-control" alt="image">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="step-2" class="tab-pane step-content">
                                    <div id="form-step-1" role="form" data-toggle="validator">


                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="card_no" class="col-md-2">Card No:</label>
                                             <div class="col-sm-4">
                                                <input type="text" name="job_card_no" id="job_card_no" class="form-control" readonly="" value="{{$employeeDetails->jobInformation->job_card_no}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="designation" class="col-md-2">Designation:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_designation" id="job_designation" value="{{$employeeDetails->jobInformation->job_designation}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="joining_date" class="col-md-2">Joining Date:</label>
                                             <div class="col-sm-4">
                                                <input class="form-control datepicker" autocomplete="off" type="text" name="job_joining_date" id="job_joining_date" value="{{$employeeDetails->jobInformation->job_joining_date}}">

                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="section" class="col-md-2">Section:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_section" id="job_section" value="{{$employeeDetails->jobInformation->job_section}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="job_reference_name" class="col-md-2">Job Reference Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_reference_name" id="job_reference_name" value="{{$employeeDetails->jobInformation->job_reference_name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="mobile_no" class="col-md-2">Mobile No:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="j_mobile_no" id="j_mobile_no" value="{{$employeeDetails->jobInformation->j_mobile_no}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Job Experience/EmployMent History :</h4>

                                             <label for="factory_name" class="col-md-2">Factory Name:</label>
                                             <div class="col-sm-4">
                                                <input class="form-control" name="job_factory_name" id="job_factory_name" value="{{$employeeDetails->jobInformation->job_factory_name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="job_exp_designation" class="col-md-2">Designation :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_exp_designation" id="job_exp_designation" value="{{$employeeDetails->jobInformation->job_exp_designation}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             
                                             
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             
                                                <label for="job_exp_designation" class="col-md-2">Employment Period  :</label>
                                                
                                                <div class="col-sm-2">
                                                   {{csrf_field()}}
                                                   <input class="form-control datepicker" autocomplete="off" type="text" name="from" id="from" value="{{$employeeDetails->jobInformation->from}}" >
                                                </div>

                                               
                                                <div class="col-sm-2">
                                                    <input class="form-control datepicker" autocomplete="off" type="text" name="to" id="to" value="{{$employeeDetails->jobInformation->to}}">
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div id="step-3" class="tab-pane step-content">
                                    <div id="form-step-2" role="form" data-toggle="validator">
                                    
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Permanent Address :</h4>
                                             <label for="village" class="col-md-1">Select Country:</label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2" name="permanent_country_id" id="permanent_country_id">
                                                   <option selected="" disabled="">Please Select a Country</option>
                                                   @if(count($countries) > 0)
                                                   @foreach($countries as $country)
                                                   <option value="{{$country->country_id}}" @if($country->country_id == $employeeDetails->permanentAddress->country->country_id) selected="" @endif>{{$country->country_name}}</option>
                                                   @endforeach
                                                   @endif
                                                </select>
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="division_id" class="col-md-1">Select Division: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 permanent_division_id" name="permanent_division_id" id="permanent_division_id">
                                                   <option value="{{$employeeDetails->permanentAddress->division->division_id}}">{{$employeeDetails->permanentAddress->division->division_name}}</option>
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="city_id" class="col-md-1">Select District: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 permanent_city_id" name="permanent_city_id" id="permanent_city_id">
                                                   <option value="{{$employeeDetails->permanentAddress->city->city_id}}">{{$employeeDetails->permanentAddress->city->city_name}}</option>
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>











                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="village" class="col-md-1">Village:</label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="village" value="{{$employeeDetails->permanentAddress->permanent_village}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="post_office" class="col-md-1">Post Office: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="post_office" value="{{$employeeDetails->permanentAddress->permanent_post_office}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="up_zila" class="col-md-1">P.S/Up-Zila: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="up_zila" value="{{$employeeDetails->permanentAddress->permanent_upzila}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       


















                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Present Address :</h4>
                                             <label for="village" class="col-md-1">Select Country:</label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2" name="present_country_id" id="present_country_id">
                                                   <option selected="" disabled="">Please Select a Country</option>
                                                   @if(count($countries) > 0)
                                                   @foreach($countries as $country)
                                                   <option value="{{$country->country_id}}" @if($country->country_id == $employeeDetails->presentAddress->country->country_id) selected="" @endif>{{$country->country_name}}</option>
                                                   @endforeach
                                                   @endif
                                                </select>
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="division_id" class="col-md-1">Select Division: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 present_division_id" name="present_division_id" id="present_division_id">
                                                   <option value="{{$employeeDetails->presentAddress->division->division_id}}">{{$employeeDetails->presentAddress->division->division_name}}</option>
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="city_id" class="col-md-1">Select District: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 present_city_id" name="present_city_id" id="present_city_id">
                                                   <option value="{{$employeeDetails->presentAddress->city->city_id}}">{{$employeeDetails->presentAddress->city->city_name}}</option>
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-12">
                                            
                                             <label for="path" class="col-md-1">Word/Road:</label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="present_road" value="{{$employeeDetails->presentAddress->present_village}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="p_post_office" class="col-md-1">Post Office: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="present_post_office" value="{{$employeeDetails->presentAddress->present_post_office}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="p_up_zila" class="col-md-1">P.S/Up-Zila: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="present_up_zila" value="{{$employeeDetails->presentAddress->present_upzila}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             
                                    
                                          </div>
                                       </div>
                                       
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Emergency Communication Address :</h4>
                                             <label for="village" class="col-md-1">Select Country:</label>
                                             <div class="col-sm-3">
                                                 <select class="form-control select2" name="emergency_country_id" id="emergency_country_id">
                                                   <option selected="" disabled="">Please Select a Country</option>
                                                   @if(count($countries) > 0)
                                                   @foreach($countries as $country)
                                                   <option value="{{$country->country_id}}" @if($country->country_id == $employeeDetails->emergencyCommunicationAddress->country->country_id) selected="" @endif>{{$country->country_name}}</option>
                                                   @endforeach
                                                   @endif
                                                </select>
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="division_id" class="col-md-1">Select Division: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 emergency_division_id" name="emergency_division_id" id="emergency_division_id" >
                                                   <option value="{{$employeeDetails->emergencyCommunicationAddress->division->division_id}}">{{$employeeDetails->emergencyCommunicationAddress->division->division_name}}</option>
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="city_id" class="col-md-1">Select District: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 emergency_city_id" name="emergency_city_id" id="emergency_city_id">
                                                   <option value="{{$employeeDetails->emergencyCommunicationAddress->city->city_id}}">{{$employeeDetails->emergencyCommunicationAddress->city->city_name}}</option>
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             
                                             <label for="e_village" class="col-md-1">Village/Road:</label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_village" value="{{$employeeDetails->emergencyCommunicationAddress->emg_comm_village}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="e_post_office" class="col-md-1">Post Office: </label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_post_office" value="{{$employeeDetails->emergencyCommunicationAddress->emg_comm_post_office}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="e_up_zila" class="col-md-1">P.S/Up-Zila: </label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_up_zila" value="{{$employeeDetails->emergencyCommunicationAddress->emg_comm_upzila}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="e_mobile" class="col-md-1">Mobile No: </label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_mobile" value="{{$employeeDetails->emergencyCommunicationAddress->emg_comm_mob_number}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                    
                                          </div>
                                       </div>
                                       
                                    </div>
                                 </div>

                                 <div id="step-4" class="tab-pane step-content">
                                    <div id="form-step-3" role="form" data-toggle="validator">
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="c_name" class="col-md-2">Local Chairman Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="chairman_name" value="{{$employeeDetails->extraInformation->chairman_name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="c_mobile" class="col-md-2">Mobile No: </label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="chairman_m_number" value="{{$employeeDetails->extraInformation->chairman_m_number}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="m_mobile" class="col-md-2">Word Member Name: </label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="member_name" value="{{$employeeDetails->extraInformation->member_name}}">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="m_mobile" class="col-md-2">Mobile No: </label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="member_m_number" value="{{$employeeDetails->extraInformation->member_m_number}}">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="marital_status" class="col-md-2">Is There Any Allegation In Thana :</label>

                                             <div class="col-sm-4">
                                                <input type="radio" name="allegation_inthana" class="reference_yes" value="1" @if($employeeDetails->extraInformation->allegation_inthana == 1) checked="" @endif> &nbsp;Yes &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="allegation_inthana" class="reference_no" value="0" @if($employeeDetails->extraInformation->allegation_inthana == 0) checked="" @endif> &nbsp;No
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2">Give Reason:</label>
                                             <div class="col-sm-4">
                                                <textarea class="form-control" name="give_reason" rows="3">{{$employeeDetails->extraInformation->give_reason}}</textarea>
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2" style="display: none;">Give Reason:</label>
                                             <div class="col-sm-4" style="display: none;">
                                                <textarea class="form-control" rows="3"readonly="">No Complain</textarea>
                                                <div class="help-block with-errors"></div>
                                             </div>

                                          </div>
                                       </div>
                                           
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                        @endif
                     </div>
                  </div>
               </div>
   </div>
   <!-- nav-tabs-custom -->
</section>
@endsection
@section('extra-js')
<script src="{{URL::to('public/assets/plugins/validator/validator.min.js')}}"></script>
<script src="{{URL::to('public/assets/plugins/smartwizard/js/jquery.smartWizard.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/assets/plugins/chosen/js/chosen.jquery.min.js')}}"></script>
@endsection
@section('script')

<script type="text/javascript">
   
$(document).ready(function(){
   $("#employeeDataTable").DataTable();
});
   //Personal-info Radio Button
   $(".reference_married").on('click',function(){
      $(this).parent().next().show().next().show().next().hide().next().hide();
   });
   //Personal-info Radio Button
   $(".reference_unmarried").on('click',function(){
    $(this).parent().next().hide().next().hide().next().show().next().show();
   });
   //Extra-info Radio Button
   $(".reference_yes").on('click',function(){
      $(this).parent().next().show().next().show().next().hide().next().hide();
   });
   $(".reference_no").on('click',function(){
      $(this).parent().next().hide().next().hide().next().show().next().show();
   });
   $(document).ready(function(){
    var btnFinish = $('<button></button>').text('Finish')
              .addClass('btn btn-info')
              .on('click', function(){
                  if( !$(this).hasClass('disabled')){
                      var elmForm = $("#myForm");
                      if(elmForm){
                          elmForm.validator('validate');
                          var elmErr = elmForm.find('.has-error');
                          if(elmErr && elmErr.length > 0){
                              alert('Oops we still have error in the form');
                              return false;
                          }else{
                              alert('Great! we are ready to submit form');
                              elmForm.submit();
                              return false;
                          }
                      }
                  }
              });
          var btnCancel = $('<button></button>').text('Cancel')
              .addClass('btn btn-danger')
              .on('click', function(){
                  $('#smartwizard').smartWizard("reset");
                  $('#myForm').find("input, textarea").val("");
              });
              // Smart Wizard
          $('#smartwizard').smartWizard({
              selected: 0,
              theme: 'dots',
              transitionEffect:'fade',
              toolbarSettings: {toolbarPosition: 'bottom',
                                toolbarButtonPosition: 'right',
                                toolbarExtraButtons: [btnFinish, btnCancel]
                              },
              anchorSettings: {
                  markDoneStep: true, // add done css
                  markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                  removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                  enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
              }
          });
          $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
              var elmForm = $("#form-step-" + stepNumber);
              // stepDirection === 'forward' :- this condition allows to do the form validation
              // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
              if(stepDirection === 'forward' && elmForm){
                  elmForm.validator('validate');
                  var elmErr = elmForm.children('.has-error');
                  if(elmErr && elmErr.length > 0){
                      // Form validation failed
                      return false;
                  }
              }
              return true;
          });
          $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
              // Enable finish button only on last step
              if(stepNumber == 3){
                  $('.btn-finish').removeClass('disabled');
              }else{
                  $('.btn-finish').addClass('disabled');
              }
          });
          //Date picker
          $('.datepicker').datepicker({
            autoclose: true,
          });
   });
   
     //permanent Get Country Wise Division
      
      $("#permanent_country_id").on('change',function(){
      var permanentCountryId = $(this).val();
      var permanentDivisionId = $("#permanent_division_id");
      
      $.ajax({
         url : 'permanentCountryWiseDivision/' + permanentCountryId,
         type : "GET",
         dataType : "json",

         success: function(data){
            //console.log(data);
            permanentDivisionId.empty();
            var content = '<option selected="" disabled="">Please Select a Division</option>';
            $.each(data, function(index, value){
               //console.log(value.division_name);
               content+= '<option value="'+value.division_id+'">'+value.division_name+'</option>';
            });
            permanentDivisionId.append(content);
         },
         error: function(){
            alert("Something Went Wrong");
         }
      });
   });

$("#permanent_division_id").on('change',function(){
      var parmanentDivisionId = $(this).val();
      var parmanentCityId     = $("#permanent_city_id");
      
      $.ajax({
         url : 'permanentDivisionWiseCity/' + parmanentDivisionId,
         method : "GET",
         dataType : "json",

         success:function(data){
            //console.log(data);
            parmanentCityId.empty();
            var content = '<option selected="" disabled="">Please Select a District</option>';
            $.each(data,function(index, value){
               content+= '<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
            parmanentCityId.append(content);
         },
         error:function(){
            alert("Somethig Went Wrong");
         }
      });
   });
  

   //present
   $("#present_country_id").on('change',function(){
      var presentCountryId = $(this).val();
      var presentDivisionId = $("#present_division_id");
      
      $.ajax({
         url : 'presentCountryWiseDivision/' + presentCountryId,
         type : "GET",
         dataType : "json",

         success: function(data){
            //console.log(data);
            presentDivisionId.empty();
            var content = '<option selected="" disabled="">Please Select a Division</option>';
            $.each(data, function(index, value){
               //console.log(value.division_name);
               content+= '<option value="'+value.division_id+'">'+value.division_name+'</option>';
            });
            presentDivisionId.append(content);
         },
         error: function(){
            alert("Something Went Wrong");
         }
      });
   });

   $("#present_division_id").on('change',function(){
      var presentDivisionId = $(this).val();
      var presentCityId     = $("#present_city_id");
      
      $.ajax({
         url : 'presentDivisionWiseCity/' + presentDivisionId,
         method : "GET",
         dataType : "json",

         success:function(data){
            //console.log(data);
            presentCityId.empty();
            var content = '<option selected="" disabled="">Please Select a District</option>';
            $.each(data,function(index, value){
               content+= '<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
            presentCityId.append(content);
         },
         error:function(){
            alert("Somethig Went Wrong");
         }
      });
   });

   //Emergency
   $("#emergency_country_id").on('change',function(){
      var emergencyCountryId = $(this).val();
      var emergencyDivisionId = $("#emergency_division_id");
      
      $.ajax({
         url : 'emergencyCountryWiseDivision/' + emergencyCountryId,
         method : "GET",
         dataType : "json",

         success: function(data){
            //console.log(data);
            emergencyDivisionId.empty();
            var content = '<option selected="" disabled="">Please Select a Division</option>';
            $.each(data, function(index, value){
               //console.log(value.division_name);
               content+= '<option value="'+value.division_id+'">'+value.division_name+'</option>';
            });
            emergencyDivisionId.append(content);
         },
         error: function(){
            alert("Something Went Wrong");
         }
      });
   });
   
    $("#emergency_division_id").on('change',function(){
      var emergencyDivisionId = $(this).val();
      var emergencyCityId     = $("#emergency_city_id");
      
      $.ajax({
         url : 'emergencyDivisionWiseCity/' + emergencyDivisionId,
         method : "GET",
         dataType : "json",

         success:function(data){
            //console.log(data);
            emergencyCityId.empty();
            var content = '<option selected="" disabled="">Please Select a District</option>';
            $.each(data,function(index, value){
               content+= '<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
            emergencyCityId.append(content);
         },
         error:function(){
            alert("Somethig Went Wrong");
         }
      });
   });

 
</script>
@endsection