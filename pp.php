<td>
                                  <a href="javascript:;" class="btn btn-success btn-xs" style="@if($personalInforation->status == 1) display:none; @endif" onclick="updateStatus('personal-info', 'active', {{$personalInforation->personal_info_id}})">
                                    <i class="fa fa-check-square-o" title="Active"></i>   
                                 </a>
                                 <a href="javascript:;" class="btn btn-warning btn-xs" style="@if($personalInforation->status == 0) display: none;@endif" onclick="updateStatus('personal-info', 'inactive', {{$personalInforation->personal_info_id}})">
                                    <i class="fa fa-ban" title="Inactive"></i>   
                                 </a>

                                    

                                  <a href="{{URL::to('hr/employee-edit')}}/{{$personalInforation->personal_info_id}}" class="btn btn-info btn-xs edit-personal-info" id="reference_{{$personalInforation->personal_info_id}}">
                                    <i class="fa fa-edit" title="Edit"></i>   
                                 </a>
                                    <a href="javascript:;" class="btn btn-success btn-xs save-update-personal-info" id="saveUpdate_{{$personalInforation->personal_info_id}}" style="display: none;">
                                    <i class="fa fa-save" title="Save"></i>   
                                    </a>
                                    <a href="javascript:;" class="btn btn-primary btn-xs reset" style="display: none;">
                                       <i class="fa fa-refresh fa-spin" title="Reset"></i>   
                                    </a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs" style="@if($personalInforation->status == 2) display: none;@endif" onclick="updateStatus('personal-info', 'delete', {{$personalInforation->personal_info_id}})">
                                       <i class="fa fa-trash" title="Delete"></i>   
                                    </a>

                                    <a class="btn btn-primary btn-xs" href="{{URL::to('hr/single-employee-view')}}/{{$personalInforation->personal_info_id}}"> 
                                       <i class="fa fa-street-view" title="view"></i> 
                                    </a>

                                 </td>



//$(document).ready(function(){

 load_data('');

$('#search').click(function(){
  var full_text_search_query = $('#full_text_search').val();
  load_data(full_text_search_query);
 });

 function load_data(full_text_search_query = '')
 {
  var _token = $("input[name=_token]").val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
   url:"{{ route('hr.ajaxSearch.action') }}",
   type:"POST",
   data:{
      full_text_search_query:full_text_search_query, 
      _token:_token
   },
   dataType:"json",
   success:function(data)
   {
      // console.log(data[0].status);
      // return false;
    var output = '';
    if(data.length > 0)
    {
      
     for(var i = 0; i < data.length; i++)
     {
      var img = "{{URL::to('public/images/personal_image/')}}/";
      var view = "{{URL::to('hr/single-employee-view')}}/";
      var edit = "{{URL::to('hr/employee-edit')}}/";

      output += '<tr>';
      output += '<td>'+data[i].personal_info_id+'</td>';
      output += '<td>'+data[i].name+'</td>';
      output += '<td>'+data[i].mobile_number+'</td>';
      output += '<td>'+data[i].education_qualification+'</td>';
      output += '<td>'+data[i].religion+'</td>';
      output += '<td>'+data[i].dob+'</td>';
      output += '<td>'+data[i].marital_status+'</td>';
      output += '<td>'+data[i].job_designation+'</td>';
      output += '<td>'+'<img src="'+img+data[i].image_path+'"/>'+'</td>';
      output += '<td>'; 
         if(data[i].status == 1){
            output += '<label class="label label-success">Active</label>';
         }else {
            output += '<label class="label label-warning">Inactive</label>';
         }           
      output +='</td>';
      output += '<td>'; 
               if(data[i].status == 1){
                output += '<a href="javascript:;" class="btn btn-warning btn-xs inactive_btn" id="reference_'+data[i].personal_info_id+'" style="display:show;" onclick="">' +
                  '<i class="fa fa-ban" title="Inactive"></i>'+   
               '</a>&nbsp';
                } else {
                 output+= '<a href="javascript:;" class="btn btn-success btn-xs active_btn" id="reference_'+data[i].personal_info_id+'" style="display:show;" onclick="">' +
                           '<i class="fa fa-check-square-o" title="Active"></i>'+   
                        '</a>&nbsp';
                }
             output += '<a href="javascript:;" class="btn btn-danger btn-xs delete_btn" id="reference_'+data[i].personal_info_id+'" style="display:show;" onclick="">' +
                  '<i class="fa fa-trash" title="delete"></i>'+   
               '</a>&nbsp';
                  
         output+= '<a href="'+edit+data[i].personal_info_id+'" class="btn btn-info btn-xs edit-personal-info" id="reference_'+data[i].personal_info_id+'">' +
                           '<i class="fa fa-edit" title="Edit"></i>'+   
                        '</a>&nbsp';
                
             
        output+= '<a class="btn btn-primary btn-xs" href="'+view+data[i].personal_info_id+'">' + 
                  '<i class="fa fa-street-view" title="view"></i>' + 
            '</a>';         

      output += '</td>';
                                
      output += '</tr>';
   }

   } else
     
    {
     output += '<tr>';
     output += '<td colspan="6">No Data Found</td>';
     output += '</tr>';
    }
    $('tbody').html(output);
   }
  });
 }

 

});


//last 

@extends('app')
@section('extra-css')
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard.css')}}">
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard_theme_arrows.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('public/assets/plugins/chosen/css/chosen.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"> 

<style type="text/css">
   .select2-container--default .select2-selection--single,
   .select2-selection .select2-selection--single {
   width: 270px;
   }

</style>
@endsection
@section('content-header')
<section class="content-header">
   <h1>
      Employee List
      <small>Preview</small>
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
   <div class="nav-tabs-custom">
      <!-- Searching panel Start -->
         <div class="row">
            <div class="form-group" style="margin-top: 10px; margin-bottom: 5px; border-radius: 20px;">
               <div class="col-md-9 col-md-offset-3">
                  <!-- <label class="col-md-1"> 
                     Search :  
                  </label> -->
                  <div class="col-md-7">
                     {{csrf_field()}}
                     <input class="form-control" type="text" name="full_text_search" id="full_text_search">
                  </div>
                  <div class="col-md-2">
                  <button type="button" name="search" id="search" class="btn btn-success">Search</button>
                  </div>
                </div>
            </div>
          </div>
      <!-- Searching panel End -->


      <ul class="nav nav-tabs">
         <li class="active"><a href="#view-info" data-toggle="tab">View Info</a></li>
         <li><a href="#add-info" data-toggle="tab">Add Info</a></li>
         <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>


      <div class="tab-content">
         <div class="tab-pane active" id="view-info">
            <div class="box box-default">
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table id="employeeDataTable" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>SL</th>
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Education</th>
                                 <th>Religion</th>
                                 <th>DOB</th>
                                 <th>Marital Status</th>
                                 <th>Designation</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>SL</th>
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Education</th>
                                 <th>Religion</th>
                                 <th>DOB</th>
                                 <th>Marital Status</th>
                                 <th>Designation</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
               </div>
            </div>
         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane" id="add-info">
            <div class="box box-default">
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                        <form action="{{route('hr.save-personalInfo.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
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
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Write your Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="mobile_number" class="col-md-2">Mobile Number :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="mobile_number" id="mobile_number">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="father_name" class="col-md-2">Father's Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Write your Father Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="f_mobile_number" class="col-md-2">Father's Mobile Number :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="father_mobile_number" id="father_mobile_number">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="mother_name" class="col-md-2">Mother's Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Write your Mother Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="m_mobile_number" class="col-md-2">Mother's Mobile Number :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="mother_mobile_number" id="mother_mobile_number">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="edu_qualification" class="col-md-2">Education Qualification:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="education_qualification" id="education_qualification" placeholder="Write your Education Qualification">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="religion" class="col-md-2">Religion :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="religion" id="religion">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="dob" class="col-md-2">Date Of Birth:</label>
                                             <div class="col-sm-4">
                                                <input class="form-control datepicker" autocomplete="off" type="text" name="dob" id="dob" placeholder="Date Of Birth">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="nation_id" class="col-md-2">National/Birth Certificate Id:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="national_id" id="national_id">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="marital_status" class="col-md-2">Marital Status:</label>

                                             <div class="col-sm-4">
                                                <input type="radio" name="marital_status" class="reference_married" value="1"> &nbsp;Married &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="marital_status" class="reference_unmarried" value="0"> &nbsp;Unmarried
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2">No of Child:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control " name="no_of_child" id="no_of_child">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2" style="display: none;">No of Child:</label>
                                             <div class="col-sm-4" style="display: none;">
                                                <input type="text" class="form-control" value="0" readonly="">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2">Image:</label>
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
                                                <input type="text" name="job_card_no" id="job_card_no" readonly="" class="form-control" placeholder="Card No Automatic Generate">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="designation" class="col-md-2">Designation:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_designation" id="job_designation" placeholder="Write your Designation Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="joining_date" class="col-md-2">Joining Date:</label>
                                             <div class="col-sm-4">
                                                <input class="form-control datepicker" autocomplete="off" type="text" name="job_joining_date" id="job_joining_date" value="2016-04-27">

                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="section" class="col-md-2">Section:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_section" id="job_section" placeholder="Write Section Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="job_reference_name" class="col-md-2">Job Reference Name:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_reference_name" id="job_reference_name"  placeholder="Job Reference Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="mobile_no" class="col-md-2">Mobile No:</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="j_mobile_no" id="j_mobile_no">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Job Experience/EmployMent History :</h4>

                                             <label for="factory_name" class="col-md-2">Factory Name:</label>
                                             <div class="col-sm-4">
                                                <input class="form-control" name="job_factory_name" id="job_factory_name" placeholder="Write Factory Name">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="job_exp_designation" class="col-md-2">Designation :</label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="job_exp_designation" id="job_exp_designation" placeholder="Write Job Experience Designation">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             
                                             
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             
                                                <label for="job_exp_designation" class="col-md-2">Employment Period  :</label>
                                                
                                                <div class="col-sm-2">
                                                   {{csrf_field()}}
                                                   <input class="form-control datepicker" autocomplete="off" type="text" name="from" id="from" value="" placeholder="From">
                                                </div>

                                               
                                                <div class="col-sm-2">
                                                    <input class="form-control datepicker" autocomplete="off" type="text" name="to" id="to" value="" placeholder="To">
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
                                                {{ Form::select('country_id', $countries, null, ['class' => 'form-control select2 permanent_country_id', 'id' => 'permanent_country_id'] ) }} 
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="division_id" class="col-md-1">Select Division: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 permanent_division_id" name="division_id" id="permanent_division_id">
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="city_id" class="col-md-1">Select District: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2" name="city_id" id="permanent_city_id">
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="village" class="col-md-1">Village:</label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="village">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="post_office" class="col-md-1">Post Office: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="post_office" placeholder="Write Post office">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="up_zila" class="col-md-1">P.S/Up-Zila: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="up_zila" placeholder="Write Up Zila ">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Present Address :</h4>
                                             <label for="village" class="col-md-1">Select Country:</label>
                                             <div class="col-sm-3">
                                                {{ Form::select('Present_country_id', $countries, null, ['class' => 'form-control select2 Present_country_id', 'id' => 'Present_country_id'] ) }} 
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="division_id" class="col-md-1">Select Division: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 present_division_id" name="present_division_id" id="present_division_id">
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="city_id" class="col-md-1">Select District: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 present_city_id" name="present_city_id" id="present_city_id">
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-12">
                                            
                                             <label for="path" class="col-md-1">Word/Road:</label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="present_road" placeholder="Write Road/Word No">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="p_post_office" class="col-md-1">Post Office: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="present_post_office" placeholder="Write Post office">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="p_up_zila" class="col-md-1">P.S/Up-Zila: </label>
                                             <div class="col-sm-3">
                                                <input type="text" class="form-control" name="present_up_zila" placeholder="Write Up Zila ">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             
                                    
                                          </div>
                                       </div>
                                       
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <h4>Emergency Communication Address :</h4>
                                             <label for="village" class="col-md-1">Select Country:</label>
                                             <div class="col-sm-3">
                                                 {{ Form::select('emergency_country_id', $countries, null, ['class' => 'form-control select2 emergency_country_id', 'id' => 'emergency_country_id'] ) }} 
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="division_id" class="col-md-1">Select Division: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 emergency_division_id" name="emergency_division_id" id="emergency_division_id" >
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="city_id" class="col-md-1">Select District: </label>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 emergency_city_id" name="emergency_city_id" id="emergency_city_id">
                                                </select>
                                                 <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             
                                             <label for="e_village" class="col-md-1">Village/Road:</label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_village">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="e_post_office" class="col-md-1">Post Office: </label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_post_office">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="e_up_zila" class="col-md-1">P.S/Up-Zila: </label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_up_zila">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="e_mobile" class="col-md-1">Mobile No: </label>
                                             <div class="col-sm-2">
                                                <input type="text" class="form-control" name="emergency_mobile">
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
                                                <input type="text" class="form-control" name="chairman_name" placeholder="Write Chairman Name">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                             <label for="c_mobile" class="col-md-2">Mobile No: </label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="chairman_m_number" placeholder="Write Chairman Mobile No">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="m_mobile" class="col-md-2">Word Member Name: </label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="member_name" placeholder="Write Member Mobile No">
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="m_mobile" class="col-md-2">Mobile No: </label>
                                             <div class="col-sm-4">
                                                <input type="text" class="form-control" name="member_m_number" placeholder="Write Member Mobile No">
                                                <div class="help-block with-errors"></div>
                                             </div>
                                          </div>
                                       </div>

                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label for="marital_status" class="col-md-2">Is There Any Allegation In Thana :</label>

                                             <div class="col-sm-4">
                                                <input type="radio" name="allegation_inthana" class="reference_yes" value="1"> &nbsp;Yes &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="allegation_inthana" class="reference_no" value="0"> &nbsp;No
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2" style="display: none;">Give Reason:</label>
                                             <div class="col-sm-4" style="display: none;">
                                                <textarea class="form-control" name="give_reason" rows="3"></textarea>
                                                <div class="help-block with-errors"></div>
                                             </div>

                                             <label for="no_of_child" class="col-md-2" style="display: none;">Give Reason:</label>
                                             <div class="col-sm-4" style="display: none;">
                                                <textarea class="form-control" rows="3"readonly="">NO Complain</textarea>
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
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
   </div>
   <!-- nav-tabs-custom -->
   <!-- SELECT2 EXAMPLE -->
</section>
@endsection
@section('extra-js')
<script src="{{URL::to('public/assets/plugins/validator/validator.min.js')}}"></script>
<script src="{{URL::to('public/assets/plugins/smartwizard/js/jquery.smartWizard.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/assets/plugins/chosen/js/chosen.jquery.min.js')}}"></script>

 <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script> 

@endsection
@section('script')

<script type="text/javascript">
   
   $(document).ready(function(){
      $("#search").on('click',function(){
         var value = $("#full_text_search").val();
         //alert(value);
         var _token = $("input[name=_token]").val();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            url : "{{ route('hr.ajaxSearch.action') }}",
            type : "POST",
            dataType:"json",
            data : {
                  search:value, 
                  _token:_token
            },
            success: function(data){
               // console.log(data);
               var output = '';
               if(data.length > 0){
                  $.each(data, function(index,value){
                  output +='<tr>'; output +='<td>'+ value.personal_info_id + '</td>';
                  output +='<td>'+ value.name + '</td>';
                  output +='<td>'+ value.mobile_number + '</td>';
                  output +='<td>'+ value.education_qualification + '</td>';
                  output +='<td>'+ value.religion + '</td>';
                  output +='<td>'+ value.dob + '</td>';
                  output +='<td>'+ value.marital_status + '</td>';
                  output +='<td>'+ value.job_designation + '</td>';
                  output +='<td>'+ value.marital_status + '</td>';
                  output +='</tr>';
               });
               }else {
                  output += '<tr>';
                  output += '<td colspan="6">No Data Found</td>';
                  output += '</tr>';
               }
               
         $('tbody').html(output);
            },
            error: function(data){
               alert("Something went wrong !!!");
            }
        });

      });
   });





//delete
$(document).on('click', '.delete_btn', function(){
                                var data = $(this).attr("id");
                                var arr = data.split('_');
                                var infoId = arr[1];
                                // alert(Id);
                                // return false;
                                var confirmDlt = confirm("Do you want to delete?");
                                if (confirmDlt) {
                                    $.ajax({
                                        url: "deletePersonalInfo/" + infoId,
                                        type : "GET",
                                        dataType: 'json',
                                        success: function(data) {
                                            if (data.success == true) {
                                                $("#reference_" + infoId).parent().parent().hide(1000).remove();
                                                $('.box-body-second').show();
                                                 $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                            } else {
                                                $('.box-body-second').show();
                                              $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                            }
                                        },
                                        error: function(data){
                                             $('.box-body-second').show();
                                              $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                        }

                                    });
                                    return true;
                                }
                                else {
                                    return false;
                                }
                            });

//active

$(document).on('click', '.inactive_btn', function(){
                                var data = $(this).attr("id");
                                var arr = data.split('_');
                                var infoId = arr[1];
                                // alert(Id);
                                // return false;
                                
                                    $.ajax({
                                        url: "inactivePersonalInfo/" + infoId,
                                        type : "GET",
                                        dataType: 'json',
                                        success: function(data) {
                                          //console.log(data);

                                            if (data.success == true) {
                                                $(".inactive_btn").hide().next().show();
                                                $(".inactive_btn").parent().prev().children().next().show().prev().hide()
                                                $('.box-body-second').show();
                                                 $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                            } else {
                                                $('.box-body-second').show();
                                              $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                            }
                                        },
                                        error: function(data){
                                             $('.box-body-second').show();
                                              $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                        }

                                    });
                                   
                                
                            });

$(document).ready(function() {
    $('#employeeDataTable').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength','colvis'
        ],

    });
});
// $(document).ready(function(){
//    $("#employeeDataTable").DataTable();
// });



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
   
   //Creating Multi Select Box using Select2 jQuery
   $(document).ready(function(){
      $(".chosen-select").chosen({
          disable_search_threshold: 10,
          no_results_text: "Oops, nothing found!",
          //placeholder_text_multiple: "Select Some Options",
          allow_single_deselect: true,
          width: "100%"
  });
   });
   //Add More Image Javascript
    $(".btn-add-image").on('click', function(){
        var content =  '<div class="form-group">'+
                            '<div class="col-md-12">'+
                                  '<label for="path" class="col-md-2">Prouduct Image:</label>' +
                                  '<div class="col-sm-4">' +
                                      '<input type="file" class="form-control" name="path[]" required="">' +
                                      '<div class="help-block with-errors"></div>' +
                                  '</div>' +
                                  '<label for="caption" class="col-md-2">Image Title: </label>' +
                                  '<div class="col-sm-3">' +
                                      '<input type="text" class="form-control" name="caption[]" placeholder="Write Image Title" required="">' +
                                      '<div class="help-block with-errors"></div>' +
                                  '</div>' +
                                  '<div class="col-sm-1">' +
                                    '<a href="javascript:;" class="btn btn-xs btn-danger btn-remove-image" title="Remove Image">' + 
                                        '<i class="fa fa-minus"></i>' +
                                    '</a>' +
                                  '</div>' +  
                              '</div>' +
                          '</div>';
              $(".load-dynamic-image-content").append(content);
              $(".btn-remove-image").on('click', function(){
                $(this).parent().parent().parent().remove();
                //$(this).parent().prev().prev().prev().prev().parent().parent().remove();
              });            
    });
   
   //Status Active-Inactive
  //  function updateStatus(modelReference,action,id)
  //  {
  //     alert("okkk");
  //     return false;
  //     var reference = $("#reference_" + id);
  //     if(action == 'delete'){
  //        if(!confirm("Do you Want to delete ??")){
  //           return false;
  //        }
  //     }
  //     $.ajax({
  //        url: "update-status/"+modelReference+"/"+action+"/"+id,
  //        method: "GET",
  //        dataType: "json",
  //        success: function(data){
  //           if(data.success == true){
  //              if(action == 'active'){
  //                 reference.prev().show().prev().hide();
  //                 reference.parent().prev().children().next().show().prev().hide();
  //              }else if(action == 'inactive'){
  //                 reference.prev().hide().prev().show();
  //                 reference.parent().prev().children().next().hide().prev().show();
  //              }else if(action == 'delete'){
  //                 reference.parent().parent().hide(1000).remove();
  //              }
  //              $('.box-body-second').show();
  //              $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  //           }else {
  //             $('.box-body-second').show();
  //              $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  //           }
  //        },
  //        error: function(data){
  //              $('.box-body-second').show();
  //              $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  //        }
  //     });
  // }
   
   //Get Country Wise Division
   $(".permanent_country_id").on('change',function(){
      var countryId = $(this).val();
      var divisionId = $(".permanent_division_id");

      $.ajax({
         url: 'permanentCountryWiseDivision/' + countryId,
         method : "GET",
         dataType : "json",
         success: function(data){
            //console.log(data);
            divisionId.empty();
            var content = '<option selected="" disabled="">Please Select a Division</option>';
            $.each(data, function(index,value){
               //console.log(value);
               content += '<option value="'+value.division_id+'">'+value.division_name+'</option>';
            });
            divisionId.append(content);
         },
         error:function(){
            alert("Something Went Wrong");
         }

      });
   });

   //Get Division Wise City
   $("#permanent_division_id").on('change',function(){
      var divisionId = $(this).val();
      var cityId = $("#permanent_city_id");
      //alert(cityId);

      $.ajax({
         url : 'permanentDivisionWiseCity/' +divisionId,
         method : "GET",
         dataType : "json",

         success:function(data){
            //console.log(data);
            cityId.empty();
            var content = '<option selected="" disabled="">Please Select a District</option>';
            $.each(data,function(index, value){
                  content+='<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
            cityId.append(content);
         },
         error:function(){
            alert("Something Went Wrong");
         }
      });
   });

   //present
   $("#Present_country_id").on('change',function(){
      var presentCountryId = $(this).val();
      var presentDivisionId = $("#present_division_id");
      
      $.ajax({
         url : 'presentCountryWiseDivision/' + presentCountryId,
         method : "GET",
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

   $(".present_division_id").on('change',function(){
      var presentDivisionId = $(this).val();
      var presentCityId     = $(".present_city_id");
      
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
