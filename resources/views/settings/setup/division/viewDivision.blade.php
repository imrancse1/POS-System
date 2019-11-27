
<div class="row">
    <div class="col-md-12">
    	<table id="divisionDatatable" class="table table-bordered table-striped">
		    <thead>
		        <tr>
		            <th>#SL</th>
		            <th>Country Name</th>
		            <th>Division Name</th>		   
		            <th>Status</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if(count($divisions) > 0)
		    	@foreach($divisions as $key => $division)
		        <tr>
		        	<td>{{$division->division_id}}</td>
		        	<td>
      					<span>{{$division->countryList->country_name}}</span>	
      					{{ Form::select('country_name',$countries,$division->country_id, ['class' => 'form-control select2', 'id' => 'countryNameType_'.$division->division_id, 'required' => 'required', 'style' => 'display:none; width:150px;']) }}
					</td>
		            <td>
		            	<span>{{$division->division_name}}</span>
		            	<input type="text" name="division_name" class="form-control" id="divisionName_{{$division->division_id}}" value="{{$division->division_name}}" style="display: none; width: 130px;">
		            </td>
		            
		        	
		            <td>
	            		<label class="label label-warning" style="@if($division->status==1) display: none; @endif">
	            		Inactive
	            		</label>
	            		<label class="label label-success" style="@if($division->status==0) display: none; @endif">
	            			active
	            		</label>
		            </td>
		            <td>
			            <a href="javascript:;" class="btn btn-success btn-xs" style="@if($division->status == 1) display:none; @endif" onclick="updateStatus('division', 'active', {{$division->division_id}})">
			            	<i class="fa fa-check-square-o" title="Active"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-warning btn-xs" style="@if($division->status == 0) display: none;@endif" onclick="updateStatus('division', 'inactive', {{$division->division_id}})">
			            	<i class="fa fa-ban" title="Inactive"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-info btn-xs edit-division" id="reference_{{$division->division_id}}">
			            	<i class="fa fa-edit" title="Edit"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-success btn-xs save-update-division" id="saveUpdate_{{$division->division_id}}" style="display: none;">
			            	<i class="fa fa-save" title="Save"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-primary btn-xs reset" style="display: none;">
			            	<i class="fa fa-refresh fa-spin" title="Reset"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-danger btn-xs" style="@if($division->status == 2) display: none;@endif" onclick="updateStatus('division', 'delete', {{$division->division_id}})">
			            	<i class="fa fa-trash" title="Delete"></i>	
			           	</a>
		            </td>
		        </tr>
		        @endforeach
		       @endif
		    </tbody>
		    <tfoot>
		        <tr>
		             <th>#SL</th>
		            <th>Country Name</th>
		            <th>Division Name</th>		   
		            <th>Status</th>
		            <th>Action</th>
		        </tr>
		    </tfoot>
		</table>
    </div>
</div>

<script type="text/javascript">
	
  $(document).ready(function(){
		$('#divisionDatatable').DataTable();
	});

  $(".modal-title").html("View Division");
  $(".btn-submit-action").parent().hide();
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
  				//console.log(data);
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
  					$(".box-modal-message").show();
  					$(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  				}else {
  					$(".box-modal-message").show();
  					$(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  				}
  			},
  			error: function(data){
  					$(".box-modal-message").show();
  					$(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  			}
  		});
  }
  $(".edit-division").on('click',function(){
  		$(this).parent().prev().prev().prev().children().next().show().prev().hide();	
  		$(this).parent().prev().prev().children().next().show().prev().hide();
  		$(this).hide().next().show().next().show();	
  });
  $(".reset").on('click',function(){
  	$(this).parent().prev().prev().prev().children().next().hide().prev().show();
  	$(this).parent().prev().prev().children().next().hide().prev().show();
  	$(this).hide().prev().hide().prev().show();
  });

  $(".save-update-division").on("click",function(){
  		var thisClass = $(this);
  		var divisionId = thisClass.attr('id').split('_')[1];
  		var countryNameType	   = $("#countryNameType_" + divisionId);
  		var countryNameTypeText = $("#countryNameType_" + divisionId + " option:selected").text();
  		var divisionName = $("#divisionName_" + divisionId);
  		//console.log(countryNameTypeText);

  		$.ajax({
  			url : 'update-save-division',
  			method : "GET",
  			dataType : "json",
  			data : {
  				'division_id'  : divisionId,
  				'country_name' :  countryNameType.val(),
  				'division_name' : divisionName.val()
  			},
  			success: function(data){
  				//console.log(data);
  				if(data.success == true){
  					alert('success');
  					countryNameType.hide().prev().show().html(countryNameTypeText);
  					divisionName.hide().prev().show().html(divisionName.val());
  					thisClass.hide().prev().show();
  					thisClass.hide().next().hide();
  					$(".box-modal-message").show();
  					$(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  				}else {
  					alert('error');
  					$(".box-modal-message").show();
  					$(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  				}
  			},
  			error: function(){
  					$(".box-modal-message").show();
  					$(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
  			}
  			
  	});

  });

  		
</script>