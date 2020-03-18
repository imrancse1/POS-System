@extends('app')
@section('extra-css')
<link rel="stylesheet" href="{{asset('/assets/plugins/smartwizard/css/smart_wizard.css')}}">
<link rel="stylesheet" href="{{asset('/assets/plugins/smartwizard/css/smart_wizard_theme_arrows.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/chosen/css/chosen.min.css')}}">
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
      Wirehouse Information
      <small>Edit Wirehouse</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Wirehouse</li>
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
            <a href="{{route('wirehouse')}}" class="btn btn-info btn-md">
               <i class="fa fa-hand-o-left"></i>&nbsp;
               View Wirehouse
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
                        @if($wirehouses)
                        <form action="{{route('wirehouse.update-wirehouse.post',$wirehouses->wirehouse_id)}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <!-- SmartWizard html -->
                           <div id="smartwizard" class="sw-main sw-theme-arrows">
                              <ul class="nav nav-tabs step-anchor">
                                 <li class="nav-item active"><a href="#step-1" class="nav-link">Step 1<br><small>Supplier Information</small></a></li>
                              </ul>
                              <div class="sw-container tab-content" style="min-height: 152px;">
                                 <div id="step-1" class="tab-pane step-content" style="display: block;">
                                    <div id="form-step-0" role="form" data-toggle="validator">

                                      <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="wirehouse_name" class="col-md-2">Wirehouse Name:</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="wirehouse_name" id="wirehouse_name" value="{{$wirehouses->wirehouse_name}}">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            <label for="wirehouse_address" class="col-md-2">Wirehouse Address :</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="wirehouse_address" id="wirehouse_address" value="{{$wirehouses->wirehouse_name}}">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="wirehouse_discription" class="col-md-2">Wirehouse Description:</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="wirehouse_discription" id="wirehouse_discription" value="{{$wirehouses->wirehouse_discription}}">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                            
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
<script src="{{asset('/assets/plugins/validator/validator.min.js')}}"></script>
<script src="{{asset('/assets/plugins/smartwizard/js/jquery.smartWizard.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/plugins/chosen/js/chosen.jquery.min.js')}}"></script>
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