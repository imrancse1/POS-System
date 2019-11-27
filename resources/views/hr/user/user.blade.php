@extends('app')
@section('extra-css')
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard.css')}}">
<link rel="stylesheet" href="{{URL::to('public/assets/plugins/smartwizard/css/smart_wizard_theme_arrows.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<style type="text/css">
   .select2-container--default .select2-selection--single,
   .select2-selection .select2-selection--single {
   width: 378px;
   }

</style>
@endsection

@section('content-header')
	<section class="content-header">
   <h1>
      User List
      <small>Preview</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">User</li>
   </ol>
</section>

@endsection 

@section('main-content')
	<section class="content">
	<!-- Custom Tabs -->
	<div class="nav-tabs-custom">
        <!-- Searching panel Start -->
         <div class="row">
            <div class="form-group" style="margin-top: 10px; margin-bottom: 5px; border-radius: 20px;">
               <div class="col-md-9 col-md-offset-3">
                  <label class="col-md-2"> 
                     Global Search :  
                  </label>
                  <div class="col-md-7">
                     {{csrf_field()}}
                     <input class="form-control global_filter" type="text" name="global_filter" id="global_filter">
                  </div>
                </div>
            </div>
          </div>
      <!-- Searching panel End -->
	    <ul class="nav nav-tabs">
	        <li class="active"><a href="#view-user" data-toggle="tab">View User</a></li>
	        <li><a href="#add-user" data-toggle="tab">Add User</a></li>
	        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
	    </ul>
	    <div class="tab-content">
	        <div class="tab-pane active" id="view-user">
	        	<div class="box box-default">
		        	<div class="box-body">
			            <div class="row">
			                <div class="col-md-12">
			                	<table id="userDatatable" class="table table-bordered table-striped">
								    <thead>
								        <tr>
								            <th>Full Name</th>
								            <th>User Name</th>
								            <th>Email</th>
								            <th>Mobile</th>
								            <th>User Type</th>
                            <th>Gender</th>
								            <th>Status</th>
								            <th>Action</th>
								        </tr>
								    </thead>
								    <tbody>
								    	@if(count($users) > 0)
                      @foreach($users as $key=> $user)
								        <tr>
								            <td>{{$user->full_name}}</td>
								            <td>
								            	{{$user->name}}
								            </td>
								            <td>
								            	{{$user->email}}
								            </td>
								            <td>
								            	{{$user->mobile_no}}
								            </td>
								            <td>
								            	{{Helper::userType($user->user_type)}}
								            </td>
                                            <td>
                                              {{Helper::gender($user->gender)}}
                                            </td>
								            <td>
							            		<label class="label label-warning" style="@if($user->status == 1) display: none;@endif">
							            			Inactive
							            		</label>
							            		<label class="label label-success" style="@if($user->status == 0) display: none;@endif">
							            			Active
							            		</label>
								            </td>
								            <td>
									            <a href="javascript:;" class="btn btn-success btn-xs" style="@if($user->status == 1) display: none;@endif" onclick="updateStatus('user','active',{{$user->id}})">
									            	<i class="fa fa-check-square-o" title="Active"></i>	
									           	</a>
									           	<a href="javascript:;" class="btn btn-warning btn-xs" style="@if($user->status == 0) display: none;@endif" onclick="updateStatus('user', 'inactive', {{$user->id}})">
									            	<i class="fa fa-ban" title="Inactive"></i>	
									           	</a>

									           	<a href="{{route('hr.edit-user',$user->id)}}" class="btn btn-info btn-xs" id="reference_{{$user->id}}">
									            	<i class="fa fa-edit" title="Edit"></i>	
									           	</a>

									           	<a href="javascript:;" class="btn btn-danger btn-xs" style="@if($user->status == 2) display: none;@endif" onclick="updateStatus('user','delete', {{$user->id}})">
									            	<i class="fa fa-trash" title="Delete"></i>	
									           	</a>
								            </td>
								        </tr>
                        @endforeach
								       @endif
								    </tbody>
								    <tfoot>
								        <tr>
								            <th>Employee Name</th>
								            <th>User Name</th>
								            <th>Email</th>
								            <th>Contact</th>
								            <th>User Type</th>
                            <th>Gender</th>
								            <th>Station</th>
								            <th>Action</th>
								        </tr>
								    </tfoot>
								</table>
			                </div>
			            </div>
			        </div>
		    	</div>
	        </div>
	        <!-- /.tab-pane -->
<div class="tab-pane" id="add-user">
<div class="box box-default">
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
        	<form action="{{route('hr.save-user.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                <!-- SmartWizard html -->
                <div id="smartwizard" class="sw-main sw-theme-arrows">
                    <ul class="nav nav-tabs step-anchor">
                        <li class="nav-item active"><a href="#step-1" class="nav-link">Step 1<br><small>Basic Information</small></a></li>
                        <li class="nav-item"><a href="#step-2" class="nav-link">Step 2<br><small>Address</small></a></li>
                        <li class="nav-item"><a href="#step-3" class="nav-link">Step 3<br><small>Login Information</small></a></li>
                    </ul>

                    <div class="sw-container tab-content" style="min-height: 152px;">

                        <div id="step-1" class="tab-pane step-content" style="display: block;">
                            <div id="form-step-0" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="full_name" class="col-md-2">Full Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Write your Full Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="user_name" class="col-md-2">User Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Write your UserName">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="father_name" class="col-md-2">Father's Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Write your Father Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="mother_name" class="col-md-2">Mother's Name:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Write your Mother Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="designation" class="col-md-2">User Type:</label>
                                        <div class="col-sm-4">
                                           <select class="form-control select2" id="user_type" name="user_type">
                                           	<option selected="" disabled="">Please select a user Type</option>
                                           	<option value="1">Admin</option>
                                           	<option value="2">Employee</option>
                                           </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="mobile_no" class="col-md-2">Mobile No:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile Number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="dob" class="col-md-2">DOB:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control pull-right datepicker" id="dob" name="dob">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="gender" class="col-md-2">Gender:</label>
                                        <div class="col-sm-4">
                                            <select class="form-control select2" name="gender" id="gender">
                                                <option selected="" disabled="">Please Select a Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="p_image" class="col-md-2">Profile Image:</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="p_image" name="p_image">
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
                                            <textarea class="form-control" name="present_address" id="present_address" rows="3" placeholder="Write your Present address"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="mother_name" class="col-md-2">Permanent Address:</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="permanent_address" id="permanent_address" rows="3" placeholder="Write your Permanent address"></textarea>
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
                                        <label for="email" class="col-md-2">Email:</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Write your Email Address">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="password" class="col-md-2">Password:</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <label for="confirm_password" class="col-md-2">Confirm Password:</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                            <div class="help-block with-errors"></div>
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
    function filterGlobal () {
    $('#userDatatable').DataTable().search( 
        $('#global_filter').val()
    ).draw();
}
    $(document).ready(function() {
    $('#userDatatable').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength','colvis'
        ],

    });
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
});

		$(document).ready(function(){

    // $("#userDatatable").DataTable();

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

    function updateStatus(modelReference,action,id)
    {
      var reference = $("#reference_" + id);
      if(action == 'delete'){
        if(!confirm("Do You Want To Delete Now ???")){
          return false;
        }
      }

      $.ajax({
        url : "update-user-status/"+modelReference+"/"+action+"/" +id,
        type : "GET",
        dataType : "json",

        success: function(data){
          // console.log(data);
          if(data.success == true){
            if(action == 'active'){
              reference.prev().show().prev().hide();
              reference.parent().prev().children().next().show().prev().hide();
            }else if(action == 'inactive'){
              reference.prev().hide().prev().show();
              reference.parent().prev().children().next().hide().prev().show();
            }else if(action == 'delete'){
              reference.parent().parent().hide(1000).remove();
            }

            $(".box-body-second").show();
            $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
          }else {
            $(".box-body-second").show();
            $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
          }
        },
        error:function(){
          $(".box-body-second").show();
            $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
        }
      });
    }








	</script>
@endsection