@extends('app') 
@section('extra-css') 
@endsection 
@section('main-content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-10">
                            <div class="page-header" style="text-align: center;">
                                <center>
                                    <h2 style="border:2px; padding: .25em; border-color: black;border-style:solid;width: 180px;">SUPERTEX</h2></center>
                                <label><u>Personal Information</u></label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src="{{URL::to('public/images/personal_image')}}/{{$employeeDetails->image_path}}" height="120px" width="100px">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">SL NO : </label>
                            <div class="col-sm-4">
                                <label class="col-sm-4">{{$employeeDetails->personal_info_id}}</label>
                                <br>
                                <br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Date :</label>
                            <div class="col-sm-4">
                                <label class="col-sm-4">{{$employeeDetails->created_at}}</label>
                                <br>
                                <br>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">NO:</label>
                            <div class="col-sm-4">
                                <label>37777</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">AFC NO:</label>
                            <div class="col-sm-4">
                                <td>000787654</td>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">Name:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->name}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Joining Date:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->job_joining_date}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Designation:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->job_designation}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">Section:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->job_section}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Date Of Birth:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->dob}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">National Id:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->national_id}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">Mobile Number:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->mobile_number}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Religion:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->religion}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Marital Status:</label>
                            <div class="col-sm-2">
                                <label>{{Helper::maritalStatus($employeeDetails->marital_status)}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">Education:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->education_qualification}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Emergency Contact:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->emergencyCommunicationAddress->emg_comm_mob_number}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Job Experience:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->total_year_job_exp}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">Period From:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->from}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">To:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->to}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Factory Name:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->job_factory_name}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2">Designation:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->job_designation}}</label>
                                <br>
                                <br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Job Reference Name:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->job_reference_name}}</label>
                                <br>
                                <br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <label for="mobile_number" class="col-md-2">Mobile Number:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->jobInformation->j_mobile_no}}</label>
                                <br>
                                <br>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="'form-group">
                        <div class="col-md-12">
                            <h3><u>Family Information</u></h3>
                            <label class="col-md-2">Father's Name :</label>
                            <div class="col-sm-4">
                                <label>{{$employeeDetails->father_name}}</label>
                            </div>
                            <label class="col-md-2">Mobile NO :</label>
                            <div class="col-sm-4">
                                <label>{{$employeeDetails->father_mobile_number}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="'form-group">
                        <div class="col-md-12">
                            <label class="col-md-2">Mother's Name :</label>
                            <div class="col-sm-4">
                                <label>{{$employeeDetails->mother_name}}</label>
                            </div>
                            <label class="col-md-2">Mobile NO :</label>
                            <div class="col-sm-4">
                                <label>{{$employeeDetails->mother_mobile_number}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="'form-group">
                        <div class="col-md-12">
                            <label class="col-md-2">No Of Child :</label>
                            <div class="col-sm-4">
                                <label>{{$employeeDetails->no_of_child}}</label>
                                <br>
                                <br>
                            </div>

                        </div>
                    </div>

                    <div class="'form-group">
                        <div class="col-md-12">
                            <h3><u>Contact Information</u></h3>
                            <label class="col-md-2">Present Address :</label>
                            <div class="col-sm-3">
                                <label>{{$employeeDetails->presentAddress->present_village}}</label>
                            </div>

                            <label class="col-md-1">P.O :</label>
                            <div class="col-sm-1">
                                <label>{{$employeeDetails->presentAddress->present_post_office}}</label>
                            </div>

                            <label class="col-md-1">P.S:</label>
                            <div class="col-sm-1">
                                <label>{{$employeeDetails->presentAddress->present_upzila}}</label>
                            </div>
                            <label class="col-md-1">District:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->presentAddress->city->city_name}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="'form-group">
                        <div class="col-md-12">
                            <label class="col-md-2">Permanent Address:Vill:</label>
                            <div class="col-sm-3">
                                <label>{{$employeeDetails->permanentAddress->permanent_village}}</label>
                            </div>
                            <label class="col-md-1">P.O:</label>
                            <div class="col-sm-1">
                                <label>{{$employeeDetails->permanentAddress->permanent_post_office}}</label>
                            </div>
                            <label class="col-md-1">P.S:</label>
                            <div class="col-sm-1">
                                <label>{{$employeeDetails->permanentAddress->permanent_upzila}}</label>
                            </div>
                            <label class="col-md-1">District:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->permanentAddress->city->city_name}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="'form-group">
                        <div class="col-md-12">
                            <label class="col-md-2">Chairman Name:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->extraInformation->chairman_name}}</label>
                            </div>

                            <label class="col-md-2">Mobile Number:</label>
                            <div class="col-sm-2">
                                <label>{{$employeeDetails->extraInformation->chairman_m_number}}</label>
                            </div>

                            <label class="col-md-3">Is There Any Allegation In Thana:</label>
                            <div class="col-sm-1">
                                <label>{{Helper::verifyIllegation($employeeDetails->extraInformation->allegation_inthana)}}</label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div style="text-align: center;">
                                Reason :
                                <label>Family</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
</div>

</section>
<!-- /.content -->
<div class="clearfix"></div>
</div>
@endsection 
@section('extra-js') 
@endsection 
@section('script')

<script type="text/javascript">
</script>
@endsection