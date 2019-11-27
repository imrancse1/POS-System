@extends('app')
@section('content-header')
<section class="content-header">
      <h1>
        Basic Setup
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Settings</a></li>
        <li class="active">Setup</li>
      </ol>
    </section>
@endsection

@section('main-content')
		<section class="content">
	<!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">

	            	<div class="col-md-4">
	                	<div class="box box-info box-solid ">
				            <div class="box-header with-border">
				              <h3 class="box-title">Basic Setup</h3>
				              <div class="box-tools pull-right">
				                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				                </button>
				              </div>
				              <!-- /.box-tools -->
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body" style="">
							     <!--  Category panel start-->
							    <div class="col-md-4 overlay-icons-body">
							        <div class="box box-danger box-solid">
							            <div class="box-body">
							            	<i class="fa fa-edit overlay-icons"></i>
							            	<br> <span> Category </span>
							            	
							            </div>
							            <!-- /.box-body -->
							            <!-- Loading (remove the following to stop the loading)-->
							            <div class="overlay">
							            	<div class="buttons" >
							            		<a class="btn btn-info" data-toggle="modal" href="">
							            			<i class="fa fa-plus-square"></i>
							            			&nbsp; Add
							            		</a>
							            	</div>
							            </div>
							            <!-- end loading -->
							        </div>
							          <!-- /.box -->
							    </div>
							     <!--  Category panel End-->
							    <div class="col-md-4 overlay-icons-body">
							        <div class="box box-danger box-solid">
							            <div class="box-body">
							            	<i class="fa fa-edit overlay-icons"></i>
							            	<br> <span> Country </span>
							            </div>
							            <!-- /.box-body -->
							            <!-- Loading (remove the following to stop the loading)-->
							            <div class="overlay">
							            	<div class="buttons" >
							            		<a class="btn btn-info" data-toggle="modal" href="#modal" onclick="loadModal('settings/add-country')">
							            			<i class="fa fa-plus-square"></i>
							            			&nbsp; Add
							            		</a>

							            		<a class="btn btn-default" data-toggle="modal" href="#modal" onclick="loadModal('settings/view-country')">
							            			<i class="fa fa-search-plus"></i>
							            			&nbsp;View
							            		</a>
							            	</div>
							            </div>
							            <!-- end loading -->
							        </div>
							          <!-- /.box -->
							    </div>

							    <div class="col-md-4 overlay-icons-body">
							        <div class="box box-danger box-solid">
							            <div class="box-body">
							            	<i class="fa fa-edit overlay-icons"></i>
							            	<br> <span> Division </span>
							            </div>
							            <!-- /.box-body -->
							            <!-- Loading (remove the following to stop the loading)-->
							            <div class="overlay">
							            	<div class="buttons" >
							            		<a class="btn btn-info" data-toggle="modal" href="#modal" onclick="loadModal('settings/add-division')">
							            			<i class="fa fa-plus-square"></i>
							            			&nbsp; Add
							            		</a>

							            		<a class="btn btn-default" data-toggle="modal" href="#modal" onclick="loadModal('settings/view-division')">
							            			<i class="fa fa-search-plus"></i>
							            			&nbsp;View
							            		</a>
							            	</div>
							            </div>
							            <!-- end loading -->
							        </div>
							          <!-- /.box -->
							    </div>

							    <div class="col-md-4 overlay-icons-body">
							        <div class="box box-danger box-solid">
							            <div class="box-body">
							            	<i class="fa fa-edit overlay-icons"></i>
							            	<br> <span> City </span>
							            </div>
							            <!-- /.box-body -->
							            <!-- Loading (remove the following to stop the loading)-->
							            <div class="overlay">
							            	<div class="buttons" >
							            		<a class="btn btn-info" data-toggle="modal" href="#modal" onclick="loadModal('settings/add-city')">
							            			<i class="fa fa-plus-square"></i>
							            			&nbsp; Add
							            		</a>

							            		<a class="btn btn-default" data-toggle="modal" href="#modal" onclick="loadModal('settings/view-city')">
							            			<i class="fa fa-search-plus"></i>
							            			&nbsp;View
							            		</a>
							            	</div>
							            </div>
							            <!-- end loading -->
							        </div>
							          <!-- /.box -->
							    </div>
				            </div>
			            <!-- /.box-body -->
			          	</div>
			        </div>
                </div>
            </div>
        </div>
</section>
@endsection
