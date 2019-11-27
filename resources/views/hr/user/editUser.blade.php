@extends('app')
@section('extra-css')
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard.css')}}">
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard_theme_arrows.css')}}">
<style type="text/css">
   .select2-container--default .select2-selection--single,
   .select2-selection .select2-selection--single {
   width: 391px;
   }

</style>
@endsection

@section('content-header')
	<section class="content-header">
   <h1>
      User Information
      <small>Update User</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">HR</a></li>
      <li class="active">User</li>
   </ol>
</section>

@endsection 

@section('main-content')
	<section class="content">
	<!-- Custom Tabs -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">
                <a href="{{route('hr.user')}}" class="btn btn-info btn-md">
                    <i class="fa fa-hand-o-left"></i>&nbsp;
                    View User
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
            @if($user)
            <form action="{{route('hr.update-user.post',$user->id)}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                <!-- SmartWizard html -->
                <div id="smartwizard" class="sw-main sw-theme-arrows">
                    <ul class="nav nav-tabs step-anchor">
                        <li class="nav-item active"><a href="#step-1" class="nav-link">Step 1<br><small>Basic Information</small></a></li>
                        <li class="nav-item"><a href="#step-2" class="nav-link">Step 2<br><small>Address</small></a></li>
                        <li class="nav-item"><a href="#step-3" class="nav-link">Step 3<br><small>Image</small></a></li>
                    </ul>

                    <div class="sw-container tab-content" style="min-height: 152px;">

                        <div id="step-1" class="tab-pane step-content" style="display: block;">
                            <div id="form-step-0" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="full_name" class="col-md-2">Full Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{$user->full_name}}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="user_name" class="col-md-2">User Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="user_name" id="user_name" value="{{$user->name}}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="father_name" class="col-md-2">Father's Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="father_name" id="father_name" value="{{$user->father_name}}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="mother_name" class="col-md-2">Mother's Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{$user->mother_name}}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="designation" class="col-md-2">User Type:</label>
                                        <div class="col-sm-4">
                                           <select class="form-control select2" id="user_type" name="user_type">
                                            <option selected="" disabled="">Please select a User Type</option>
                                            <option value="1" @if($user->user_type == 1) selected = ""@endif>Admin</option>
                                            <option value="2" @if($user->user_type == 2) selected=""@endif>Employee</option>
                                           </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="mobile_no" class="col-md-2">Mobile No:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="{{$user->mobile_no}}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="dob" class="col-md-2">DOB:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control pull-right datepicker" id="dob" name="dob" value="{{$user->dob}}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="gender" class="col-md-2">Gender:</label>
                                        <div class="col-sm-4">
                                            <select class="form-control select2" name="gender" id="gender">
                                                <option selected="" disabled="">Please Select a Gender</option>
                                                <option value="1" @if($user->user_type == 1) selected=""@endif>Male</option>
                                                <option value="2" @if($user->user_type == 2) selected=""@endif>Female</option>
                                                <option value="3" @if($user->user_type == 3)selected=""@endif>Other</option>
                                            </select>
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
                                        <label for="present_address" class="col-md-2">Present Address:</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="present_address" id="present_address" rows="3">{{$user->present_address}}</textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="mother_name" class="col-md-2">Permanent Address:</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="permanent_address" id="permanent_address" rows="3" placeholder="Write your Permanent address">{{$user->permanent_address}}</textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane step-content">
                            <div id="form-step-2" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="p_image" class="col-md-2">Current Image:</label>
                                        <div class="col-sm-10">
                                            <img src="{{url('public/images/user_image',$user->profile_image)}}" height="60px" width="100px">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="p_image" class="col-md-2">New Image:</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="p_image" name="p_image" class="form-control">
                                            <div class="help-block with-errors"></div>
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
	      
        
</section>
@endsection 

@section('extra-js')
<script src="{{URL::to('public/assets/plugins/validator/validator.min.js')}}"></script>
<script src="{{URL::to('public/assets/plugins/smartwizard/js/jquery.smartWizard.js')}}"></script>

@endsection 

@section('script')
	<script type="text/javascript">
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

	</script>
@endsection