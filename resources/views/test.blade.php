@extends('app')
@section('extra-css')

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
<!-- Main content -->
<section class="content">
   <!--Search Yajara -->
   <!--Search End Yajara -->
   <!-- Custom Tabs -->
   <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
         <li class="active"><a href="#view-info" data-toggle="tab">View User</a></li>
         <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      
      <div class="row">
    <div class="form-group col-md-6">
    <h5>Name <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="text" name="name" id="name" class="form-control" placeholder="Please search name"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-6">
    <h5>Email<span class="text-danger"></span></h5>
    <div class="controls">
        <input type="text" name="email" id="email" class="form-control" placeholder="Please Search Email"> <div class="help-block"></div></div>
    </div>
    <div class="text-left" style="
    margin-left: 15px;
    ">
    <button type="submit" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
    </div>
    </div>



      <div class="tab-content">
         <div class="tab-pane active" id="view-info">
            <div class="box box-default">
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table id="laravel_datatable" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>SL</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Intro</th>
                                 <th>First Name</th>
                                 <th>Created</th>
                                 <th>Updated</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           
                           <tfoot>
                              <tr>
                                 <th>SL</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Intro</th>
                                 <th>First Name</th>
                                 <th>Created</th>
                                 <th>Updated</th>
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
      </div>
      <!-- /.tab-content -->
   </div>
   <!-- nav-tabs-custom -->
   <!-- SELECT2 EXAMPLE -->
</section>
@endsection
@section('extra-js')

@endsection
@section('script')

<script type="text/javascript">
   
// $(document).ready( function () {
//      $("#laravel_datatable").DataTable();
  
//   });


$(function() {
    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'intro', name: 'intro' },
            { data: 'firstname', name: 'firstname' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data : 'status', name: 'status' },
            { data : 'action', name: 'action' },
            
        ]
    });
});




   
   //Status Active-Inactive
   function updateStatus(modelReference,action,id)
  {
      var reference = $("#reference_" + id);
      if(action == 'delete'){
         if(!confirm("Do you Want to delete ??")){
            return false;
         }
      }
      $.ajax({
         url: "update-status/"+modelReference+"/"+action+"/"+id,
         method: "GET",
         dataType: "json",
         success: function(data){
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
               $('.box-body-second').show();
               $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
            }else {
              $('.box-body-second').show();
               $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
            }
         },
         error: function(data){
               $('.box-body-second').show();
               $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
         }
      });
  }
   
   
   
    
  
</script>
@endsection
