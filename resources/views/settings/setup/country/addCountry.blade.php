    
<div class="row">
    <div class="col-md-12">
        <form action="{{route('settings.save-country.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true">
            {{csrf_field()}}
            <!-- SmartWizard html -->
            <div class="form-group">
                <div class="col-md-12">
                    <label for="country_name" class="col-md-4">Country Name:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="country_name[]" id="country_name" placeholder="Write Your Country Name English" required="">
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

	$(".modal-title").html('Add Country');
    $('.btn-submit-action').parent().show();

	$('.btn-submit-action').on('click', function(){
		$("#myForm").submit();
	});

    //Add more Country row
    $(".btn-add-row").on('click',function(){
        var content = '<div class="form-group">' +
                '<div class="col-md-12">' +
                    '<label for="country_name" class="col-md-4">Country Name:</label>' +
                    '<div class="col-md-7">'+
                        '<input type="text" class="form-control" name="country_name[]" id="country_name" placeholder="Write Your Country Name English" required="">' +
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

</script>