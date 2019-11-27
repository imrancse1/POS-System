
<div class="row">
    <div class="col-md-12">
    	<table id="cityDatatable" class="table table-bordered table-striped">
		    <thead>
		        <tr>
		            <th>#SL</th>
		            <th>Country Name</th>
		            <th>Division Name</th>		   
                <th>City Name</th>       
		            <th>Status</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if(count($cities) > 0)
		    	@foreach($cities as $key => $city)
		        <tr>
		        	<td>{{$city->city_id}}</td>
              <td>
                <span>{{$city->divisionList->countryList->country_name}}</span> 
                {{ Form::select('country_name',$countries,$city->country_id, ['class' => 'form-control select2', 'id' => 'countryNameType_'.$city->city_id, 'required' => 'required', 'style' => 'display:none; width:150px;']) }}
          </td>
		        	<td>
      					<span>{{$city->divisionList->division_name}}</span>	
      					{{ Form::select('division_name',$divisions,$city->division_id, ['class' => 'form-control select2', 'id' => 'divisionNameType_'.$city->city_id, 'required' => 'required', 'style' => 'display:none; width:150px;']) }}
					</td>
		            <td>
		            	<span>{{$city->city_name}}</span>
		            	<input type="text" name="city_name" class="form-control" id="cityName_{{$city->city_id}}" value="{{$city->city_name}}" style="display: none; width: 130px;">
		            </td>
		            
		        	
		            <td>
	            		<label class="label label-warning" style="@if($city->status==1) display: none; @endif">
	            		Inactive
	            		</label>
	            		<label class="label label-success" style="@if($city->status==0) display: none; @endif">
	            			active
	            		</label>
		            </td>
		            <td>
			            <a href="javascript:;" class="btn btn-success btn-xs" style="@if($city->status == 1) display:none; @endif" onclick="updateStatus('city', 'active', {{$city->city_id}})">
			            	<i class="fa fa-check-square-o" title="Active"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-warning btn-xs" style="@if($city->status == 0) display: none;@endif" onclick="updateStatus('city', 'inactive', {{$city->city_id}})">
			            	<i class="fa fa-ban" title="Inactive"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-info btn-xs edit-city" id="reference_{{$city->city_id}}">
			            	<i class="fa fa-edit" title="Edit"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-success btn-xs save-update-city" id="saveUpdate_{{$city->city_id}}" style="display: none;">
			            	<i class="fa fa-save" title="Save"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-primary btn-xs reset" style="display: none;">
			            	<i class="fa fa-refresh fa-spin" title="Reset"></i>	
			           	</a>
			           	<a href="javascript:;" class="btn btn-danger btn-xs" style="@if($city->status == 2) display: none;@endif" onclick="updateStatus('city', 'delete', {{$city->city_id}})">
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
                <th>City Name</th>		   
		            <th>Status</th>
		            <th>Action</th>
		        </tr>
		    </tfoot>
		</table>
    </div>
</div>

<script type="text/javascript">
	
  $(document).ready(function(){
		$("#cityDatatable").DataTable();
	});

  $(".modal-title").html("View City");
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
  $(".edit-city").on('click',function(){
    $(this).parent().prev().prev().prev().prev().children().next().show().prev().hide();
  		$(this).parent().prev().prev().prev().children().next().show().prev().hide();	
  		$(this).parent().prev().prev().children().next().show().prev().hide();
  		$(this).hide().next().show().next().show();	
  });
  $(".reset").on('click',function(){
  	$(this).parent().prev().prev().prev().prev().children().next().hide().prev().show();
    $(this).parent().prev().prev().prev().children().next().hide().prev().show();
  	$(this).parent().prev().prev().children().next().hide().prev().show();
  	$(this).hide().prev().hide().prev().show();
  });

  $(".save-update-city").on("click",function(){
  		var thisClass = $(this);
  		var cityId = thisClass.attr('id').split('_')[1];
  		var countryNameType	   = $("#countryNameType_" + cityId);
  		var countryNameTypeText = $("#countryNameType_" + cityId + " option:selected").text();
      var divisionNameType    = $("#divisionNameType_" + cityId);
      var divisionNameTypeText = $("#divisionNameType_" + cityId + " option:selected").text();
  		var cityName = $("#cityName_" + cityId);
  		//console.log(countryNameTypeText);

  		$.ajax({
  			url : 'update-save-city',
  			method : "GET",
  			dataType : "json",
  			data : {
  				'city_id'      : cityId,
  				'country_name' :  countryNameType.val(),
          'division_name':  divisionNameType.val(),
  				'city_name'    : cityName.val()
  			},
  			success: function(data){
  				//console.log(data);
  				if(data.success == true){
  					alert('success');
  					countryNameType.hide().prev().show().html(countryNameTypeText);
            divisionNameType.hide().prev().show().html(divisionNameTypeText);
  					cityName.hide().prev().show().html(cityName.val());
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