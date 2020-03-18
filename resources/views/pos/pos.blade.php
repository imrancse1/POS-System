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
@endsection 
@section('content-header')
<section class="content-header">
    <h1>
      Pos List
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
        <!-- Searching panel Start -->
        <div class="row">
            <div class="form-group" style="margin-top: 10px; margin-bottom: 5px; border-radius: 20px;">
            </div>
        </div>
        <!-- Searching panel End -->

        <ul class="nav nav-tabs">
            <li class="active"><a href="#view-info" data-toggle="tab">View Pos</a></li>
            <li><a href="#add-info" id="add" data-toggle="tab">Add Pos</a></li>
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
                                            <th>Vendor Name</th>
                                            <th>Sales/Emp Name</th>
                                            <th>Product Name</th>
                                            <th>Wirehouse Name</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Reference</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if(count($poses) > 0)
                                        @foreach($poses as $key=>$pos)
                                        <tr>
                                            <td>{{$pos->pos_id}}</td>
                                            <td>{{$pos->vendor_name}}</td>
                                            <td>{{$pos->employee_name}}</td>
                                            <td>{{$pos->product_name}}</td>
                                            <td>{{$pos->wirehouse_name}}</td>
                                            <td>{{$pos->product_quantity}}</td>
                                            <td>{{$pos->product_rate}}</td>
                                            <td>{{$pos->reference}}</td>
                                            
                                            <td>{{$pos->total_amount}}</td>
                                            

                                            <!-- <td>
                                                <label class="label label-warning" style="">
                                                    Inactive
                                                </label>
                                                <label class="label label-success" style="">
                                                    active
                                                </label>
                                            </td> -->

                                            <td>
                                               
                                                <!-- <a href="" class="btn btn-info btn-xs edit-personal-info" id="reference_">
                                                    <i class="fa fa-edit" title="Edit"></i>
                                                </a> -->
                                                <a href="{{route('poos-delete',$pos->pos_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-danger btn-xs edit-personal-info" id="reference_">
                                                    <i class="fa fa-trash" title="Edit"></i>
                                                </a>


                                                <a href="javascript:;" class="btn btn-success btn-xs save-update-personal-info" id="" style="display: none;">
                                                    <i class="fa fa-save" title="Save"></i>
                                                </a>
                                                <a href="javascript:;" class="btn btn-primary btn-xs reset" style="display: none;">
                                                    <i class="fa fa-refresh fa-spin" title="Reset"></i>
                                                </a>
                                                <!-- <a href="javascript:;" class="btn btn-danger btn-xs" style="" onclick="updateStatus('personal-info', 'delete',">
                                                    <i class="fa fa-trash" title="Delete"></i>
                                                </a> -->

                                                <!-- <a class="btn btn-primary btn-xs" href="">
                                                    <i class="fa fa-street-view" title="view"></i>
                                                </a> -->

                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                       
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Vendor Name</th>
                                            <th>Sales/Emp Name</th>
                                            <th>Product Name</th>
                                            <th>Wirehouse Name</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Reference</th>
                                            <th>Total Amount</th>
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
                <form action="{{route('pos.save-pos')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- SmartWizard html -->
                    <div id="smartwizard" class="sw-main sw-theme-arrows">
                        <ul class="nav nav-tabs step-anchor">
                            <li class="nav-item active"><a href="#step-1" class="nav-link">Step <br><small>Pos Information</small></a></li>
                           
                        </ul>
                <div class="sw-container tab-content" style="min-height: 152px;">
                    <div id="step-1" class="tab-pane step-content" style="display: block;">
                        <div id="form-step-0" role="form" data-toggle="validator">
                            <div class="form-group">
                                <div class="col-md-12">

                                	<label for="vendor_id" class="col-md-2">Vendor Name:</label>
                                    <div class="col-sm-4">
                                       
                                         <select name="vendor_id" class="form-control" id="vendor_id" required="">
                                        <option value="">Please Select a Vendor </option>
                                          @if(count($vendors) > 0)
                                          @foreach($vendors as $key=> $vendor)  
                                        
                                        <option value="{{$vendor->vendor_id}}">{{$vendor->vendor_name}} </option>
                                        @endforeach
                                          @endif  
                                        
                                        </select>

                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <label for="product_id" class="col-md-2">Employee Name :</label>
                                    <div class="col-sm-4">

                                    	<select name="employee_id" class="form-control" id="employee_id" required="">
                						</select>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">

                                	<label for="supplier_id" class="col-md-2">Product Name :</label>
                                    <div class="col-sm-4">
                                       
                                         <select name="product_name" class="form-control id qty" id="product_id" required="">
                                        <option selected="" disabled="">Please Select a Product </option>
                                          @if(count($products) > 0)
                                          @foreach($products as $key=> $product)  
                                        
                                        <option value="{{$product->product_id}}">{{$product->product_name}} </option>
                                        @endforeach
                                          @endif  
                                        
                                        </select>

                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <label for="stock_in" class="col-md-2">Wirehouse:</label>
                                    <div class="col-sm-4">
                                       
                                      <select name="wirehouse_id" class="form-control" id="wirehouse_id" required="">
                                        </select>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">

                                	<label for="inventory_quantity" class="col-md-2">Inventory Quantity :</label>
                                    <div class="col-sm-4">
                                      
                                      <input type="hidden" class="form-control quantity" name="quantity" id="quantity">

                                       <input type="text" class="form-control minutesInput" name="product_quantity" id="product_quantity">
                                       <p id="quantityShow" class="col-md-2"></p>
                                       
                                    </div>
                                        <div class="help-block with-errors"></div>
                                    
                                    <label for="indentory_description" class="col-md-2">Product Rate :</label>
                                    <div class="col-sm-4" id="rate">

                                        <input type="text" class="form-control product_rate" name="product_rate" id="product_rate">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    

                                </div>
                            </div>


                             <div class="form-group">
                                <div class="col-md-12">

                                    <label for="total_amount" class="col-md-2">Total Amount :</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="Write your indentory quantity">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    

                                    <label for="total_amount" class="col-md-2">Reference :</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="reference" id="reference" placeholder="Write your indentory quantity">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="indentory_description" class="col-md-2">Description :</label>
                                    <div class="col-sm-4" id="rate">

                                       <textarea class="form-control" name="description"></textarea>
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
            var employeeId = $("#employee_id");
            //alert(vendorId);

            $.ajax({
                url: "vendorWiseEmployeeName/"+vendorId,
                type: "GET",
                success:function(data){
                    employeeId.empty();
                    var content = '<option selected="" disabled="">Please Select Employee</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.employee_id+'"> '+value.employee_name+''
                        '</option>';
                    });
                    employeeId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });


       $(document).ready(function(e){
        $("input").change(function(){
            var sub = 0;
            $("input[name=product_quantity]").each(function(){
                sub = sub + parseInt($(this).val());
            }) 
            $("input[name=product_rate]").each(function(){
                sub = sub * parseInt($(this).val());
            })

            $("input[name=total_amount]").val(sub);
        });
    });



         $("#product_id").on('change', function(){
            var productId = $(this).val();
            var wirehouseId = $("#wirehouse_id");

            $.ajax({
                url: "productWiseWirehouse/"+productId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    wirehouseId.empty();
                    var content = '<option selected="" disabled="">Please Select Wirehouse</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.wirehouse_id+'"> '+value.wirehouse_name+''
                        '</option>';
                    });
                    wirehouseId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });


         $(".qty").on('change',function(){
            var productId = $(this).val();
            var productQty = $("#quantity");

            $.ajax({
                url: "productWiseQuantity/"+productId,
                type: "GET",
                dataType: "json",
                success:function(data){
                    // console.log(data);
                    // return false;
                    productQty.empty();
                    $("#quantityShow").html(data + ' Product Available');
                    $("input[name=quantity]").val(data);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });



        $(".id").on('change',function(){
            var productId = $(this).val();
            var product_rate = $("#product_rate");

            $.ajax({
                url: "productWiseRate/"+productId,
                type: "GET",
                dataType: "json",
                success:function(data){
                    // console.log(data);
                    // return false;
                    product_rate.empty();
                    //product_rate.html(data);
                    $("input[name=product_rate]").val(data);
                    //document.getElementById('rate').innerHTML=data;
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
    
 // $(".minutesInput").on('keyup keypress blur change', function(e) {
 //        var max = $(".minutesInput").val();
 //    if($(this).val() > 120){
 //        alert("Maximum Size are executed!!");
 //      $(this).val('120');
 //      return false;
 //    }

 //  });
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