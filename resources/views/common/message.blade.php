
@if(Session::has('success') || Session::has('error') || count($errors) > 0)
<div class="box-body">
	@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible messageBody" style="display: none;">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    {{Session::get('success')}}
		</div>
	@elseif(Session::has('error'))
		<div class="alert alert-warning alert-dismissible messageBody" style="display: none;">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    {{Session::get('error')}}
		</div>
	@endif

	@if(count($errors->all()) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-warning alert-dismissible messageBody" style="display: none;">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    {{$error}}
			</div>
		@endforeach
	@endif
</div>
@endif

<!-- //Message from Ajax request// -->
<div class="box-body box-body-second" style="display: none;">
	<div class="alert alert-success alert-dismissible messageBodySuccess" style="display: none;">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <span></span>
	</div>
	<div class="alert alert-warning alert-dismissible messageBodyError" style="display: none;">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <span></span>
	</div>
</div>

<!-- Script for show hide -->
<script type="text/javascript">
	$(".messageBody").slideDown(1000).delay(3000).slideUp(1000);
</script>

