@extends('app') @section('extra-css')
<link rel="stylesheet" href="{{asset('/assets/plugins/smartwizard/css/smart_wizard.css')}}">
<link rel="stylesheet" href="{{asset('/assets/plugins/smartwizard/css/smart_wizard_theme_arrows.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/chosen/css/chosen.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

<style type="text/css">
    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        width: 270px;
    }
    
    .TitleActive {
        background: yellow;
    }
</style>
@endsection @section('content-header')
<section class="content-header">
    <h1>
      Employee Edit
      <small>Preview</small>
   </h1>
    <h1 style="display: none;" id="inactiveMsg">Inactive successfully</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Employee</li>
    </ol>
</section>
@endsection @section('main-content')
<!-- Main content -->
<section class="content">
    <div class="nav-tabs-custom">

       <div class="box box-default">
                <div class="box-body">
                    <div class="row">
            <div class="col-md-12">
                @if($employee)
                <form action="{{route('employee.save-employee.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- SmartWizard html -->
                    <div id="smartwizard" class="sw-main sw-theme-arrows">
                        <ul class="nav nav-tabs step-anchor">
                            <li class="nav-item active"><a href="#step-1" class="nav-link">Step <br><small>Employee Information</small></a></li>
                           
                        </ul>
                <div class="sw-container tab-content" style="min-height: 152px;">
                    <div id="step-1" class="tab-pane step-content" style="display: block;">
                        <div id="form-step-0" role="form" data-toggle="validator">


                             <div class="form-group">
                                <div class="col-md-12">

                                    <label for="employee_name" class="col-md-2">Employee Name :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{$employee->employee_name}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    

                                    <label for="employee_phone" class="col-md-2">Employee Phone :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_phone" id="employee_phone"value="{{$employee->employee_phone}}">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    

                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12">

                                     <label for="employee_code" class="col-md-2">Employee Code :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_code" id="employee_code" value="{{$employee->employee_code}}">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <label for="vendor_id" class="col-md-2">Employee Area:</label>
                                    <div class="col-sm-4">

                                        <select name="vendor_id" class="form-control" id="vendor_id" required="">
                                       

                                             @if(count($vendors) > 0)
                                            @foreach($vendors as $vendor)
                                            <option value="{{$vendor->vendor_id}}" {{($vendor->vendor_id == $employee->vendor_id) ? 'selected' : ''}} >{{$vendor->vendor_area}}</option>
                                            @endforeach     
                                            @endif



                                           

                                        </select>
                                        

                                        <div class="help-block with-errors"></div>
                                    </div>

                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">

                                    <label for="employee_zone" class="col-md-2">Employee Zone:</label>
                                    <div class="col-sm-4">

                                        <select name="employee_zone" class="form-control" id="employee_zone" required="">
                                          
                                       <!--  <option value="{{$vendor->vendor_id}}">{{$employee->employee_zone}}</option> -->

                                         @if(count($vendors) > 0)
                                            @foreach($vendors as $vendor)
                                            <option value="{{$vendor->vendor_id}}" {{($vendor->vendor_id == $employee->vendor_id) ? 'selected' : ''}} >{{$vendor->vendor_zone}}</option>
                                            @endforeach     
                                            @endif


                                         
                                        </select>
                                       
                                        

                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                   
                                    <label for="employee_designation" class="col-md-2">Employee Designation :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_designation" id="employee_designation" value="{{$employee->employee_designation}}">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">

                                    <label for="employee_target_set" class="col-md-2">Employee Target Set :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_target_set" id="employee_target_set" value="{{$employee->employee_target_set}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    

                                    <label for="employee_sales_history" class="col-md-2">Employee Sales History :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_sales_history" id="employee_sales_history" value="{{$employee->employee_sales_history}}">
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

        
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
    <!-- SELECT2 EXAMPLE -->
</section>
@endsection @section('extra-js')
<script src="{{asset('/assets/plugins/validator/validator.min.js')}}"></script>
<script src="{{asset('/assets/plugins/smartwizard/js/jquery.smartWizard.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/plugins/chosen/js/chosen.jquery.min.js')}}"></script>

<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

@endsection @section('script')

<script type="text/javascript">

    // mycode
    $(document).ready(function() {
        
         $("#vendor_id").on('change', function(){
            var vendorId = $("#vendor_id").val();
            var employeeZone = $("#employee_zone");

            $.ajax({
                url: "areaWiseZone/"+vendorId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    employeeZone.empty();
                    var content = '<option selected="" disabled="">Please Select Zone</option>';
                    $.each(data,function(index,value) {
                        // console.log(value.license_number);
                        // return false;
                        content += '<option value="'+value.vendor_id+'"> '+value.vendor_zone+''
                        '</option>';
                    });
                    employeeZone.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });
    });

    

    //end mycode








    $(document).ready(function() {
        $('#employeeDataTable').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength', 'colvis'
            ],

        });
    });

    
    $(document).ready(function() {
        var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function() {
                if (!$(this).hasClass('disabled')) {
                    var elmForm = $("#myForm");
                    if (elmForm) {
                        elmForm.validator('validate');
                        var elmErr = elmForm.find('.has-error');
                        if (elmErr && elmErr.length > 0) {
                            alert('Oops we still have error in the form');
                            return false;
                        } else {
                            alert('Great! we are ready to submit form');
                            elmForm.submit();
                            return false;
                        }
                    }
                }
            });
        var btnCancel = $('<button></button>').text('Cancel')
            .addClass('btn btn-danger')
            .on('click', function() {
                $('#smartwizard').smartWizard("reset");
                $('#myForm').find("input, textarea").val("");
            });
        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect: 'fade',
            toolbarSettings: {
                toolbarPosition: 'bottom',
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
            if (stepDirection === 'forward' && elmForm) {
                elmForm.validator('validate');
                var elmErr = elmForm.children('.has-error');
                if (elmErr && elmErr.length > 0) {
                    // Form validation failed
                    return false;
                }
            }
            return true;
        });
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if (stepNumber == 3) {
                $('.btn-finish').removeClass('disabled');
            } else {
                $('.btn-finish').addClass('disabled');
            }
        });
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
        });
    });

    //Creating Multi Select Box using Select2 jQuery
    $(document).ready(function() {
        $(".chosen-select").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            //placeholder_text_multiple: "Select Some Options",
            allow_single_deselect: true,
            width: "100%"
        });
    });
    

    //Status Active-Inactive
    function updateStatus(modelReference, action, id) {
        var reference = $("#reference_" + id);
        if (action == 'delete') {
            if (!confirm("Do you Want to delete ??")) {
                return false;
            }
        }
        $.ajax({
            url: "update-status/" + modelReference + "/" + action + "/" + id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data.success == true) {
                    if (action == 'active') {
                        reference.prev().show().prev().hide();
                        reference.parent().prev().children().next().show().prev().hide();
                    } else if (action == 'inactive') {
                        reference.prev().hide().prev().show();
                        reference.parent().prev().children().next().hide().prev().show();
                    } else if (action == 'delete') {
                        reference.parent().parent().hide(1000).remove();
                    }
                    $('.box-body-second').show();
                    $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                } else {
                    $('.box-body-second').show();
                    $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                }
            },
            error: function(data) {
                $('.box-body-second').show();
                $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
            }
        });
    }









    
</script>
@endsection