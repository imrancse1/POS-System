@extends('app')
@section('extra-css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content-header')
<section class="content-header">
    <h1>
       Employee Reports
        <small>Preview</small>
      </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Employee Reports</li>
    </ol>
</section>
@endsection
@section('main-content')
         
      <!-- Main content -->
<section class="content">
   <!-- Custom Tabs -->
   <div class="nav-tabs-custom">
      <form name="searchForm" class="searchForm form-horizontal" method="post" action="{{route('hr.getEmployeeReportsData.post')}}">
         <div class="row">
            <div class="form-group" style="margin-top: 10px; margin-bottom: 5px;">
               <div class="col-md-9 col-md-offset-3">
                  <label class="col-md-1"> 
                     Name: 
                  </label>
                  <div class="col-md-3">
                     {{csrf_field()}}
                     <input class="form-control" type="text" name="name" id="name" value="{{$name}}">
                     
                  </div>
                  <label class="col-md-1"> 
                     Email: 
                  </label>
                  <div class="col-md-3">
                      <input class="form-control" type="text" name="email" id="email" value="{{$email}}">
                  </div>
                  <div class="col-md-2">
                     <button class="btn btn-sm btn-primary" type="submit"> Submit </button>
                  </div>
                </div>
            </div>
          </div>
      </form>
       
       <div class="tab-content">
           <div class="tab-pane active">
            <div class="box box-default">
               <div class="box-body">
                     <div class="row">
                         <div class="col-md-12">
                           <table id="employeeReportDatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
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
       </div>
@endsection
@section('extra-js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
@section('script')

<script type="text/javascript">
   $(document).ready(function(){
      var name = $("#name").val();
      var email = $("#email").val();
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $("#employeeReportDatatable").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        'order': [[0,"asc"]],

        ajax: {
           url : "{{route('hr.get-test-employee-reports')}}",
           type: "POST",
           dataType: 'json',
           data: {
              'name' : name,
              'email' : email
           }
        },
        columns: [
            { data: 'id', name: 'id', orderable:true, searchable: true },
            { data: 'name', name: 'name', orderable: true, searchable:true },
            { data: 'email', name: 'email', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: false },
            { data: 'action', name: 'action', orderable: true, searchable: false },
        ]
    });
   });

   $(document).ready(function() {
    $( "#name" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: "{{route('hr.searchAutoComplete')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    // console.log(obj);
                    // return false;
                    return obj.name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});

    
  
</script>
@endsection
