    
<div class="row">
    <div class="col-md-12">
        <form action="{{route('settings.save-city.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true">
            {{csrf_field()}}
            <!-- SmartWizard html -->
            <div class="form-group">
                <div class="col-md-12">
                    <label for="country_name" class="col-md-4">Country Name:</label>
                   <div class="col-md-7">
                        {{ Form::select('country_name', $countries, null, ['class' => 'form-control select2', 'id' => 'country_id','required' => 'required'] ) }}      
                        <div class="help-block with-errors"></div>
                    </div>
                    
                </div>
            </div>

                    <div class="form-group">
                        <div class="col-md-12">
                        <label for="select-division" class="col-md-4">Select Division:</label>
                         <div class="col-md-7">
                            <select class="form-control select2" name="division_name" id="division_id" required="">
                               
                            </select>
                            <div class="help-block with-errors"></div>
                         </div>
                        </div>
                    </div>


            <div class="form-group">
                <div class="col-md-12">
                    <label for="city_name" class="col-md-4">City Name:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="city_name[]" id="city_name" placeholder="Write Your Division Name English" required="">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-1">
                        <a href="javascript:;" class="btn btn-success btn-xs btn-add-row" title="Add More Country">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="load-dynamic-image-content">    </div>
            
        </form>
    </div>
</div>

<script type="text/javascript">

	$(".modal-title").html('Add Division');
    $('.btn-submit-action').parent().show();

	$('.btn-submit-action').on('click', function(){
		$("#myForm").submit();
	});
    $(".select2").select2();

    //Add more Country row
    $(".btn-add-row").on('click',function(){
        var content = '<div class="form-group">' +
                '<div class="col-md-12">' +
                    '<label for="country_name" class="col-md-4">City Name:</label>' +
                    '<div class="col-md-7">'+
                        '<input type="text" class="form-control" name="city_name[]" id="city_name" placeholder="Write Your Division Name English" required="">' +
                        '<div class="help-block with-errors"></div>' +
                    '</div>' +
                    '<div class="col-md-1">' +
                        '<a href="javascript:;" class="btn btn-danger btn-xs btn-remove-row" title="Remove Row">' +
                            '<i class="fa fa-minus"></i>'+
                        '</a>'+
                    '</div>'+
                '</div>'+
            '</div>';

            $(".load-dynamic-image-content").append(content);
            $(".btn-remove-row").on('click',function(){
                $(this).parent().parent().parent().remove();
            });
    });

    //Country Wise Division
$("#country_id").on('change',function(){
      var countryId = $(this).val();
      var divisionId = $("#division_id");

      $.ajax({
         url: 'countryWiseDivision/' + countryId,
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
</script>