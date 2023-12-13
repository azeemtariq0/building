@extends('layouts.app')


@section('content')

@if (count($errors) > 0)
<div id="content" class="padding-20">

    <div class="alert alert-danger margin-bottom-30">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div id="content" class="padding-20">
        <ul class="nav nav-pills">
            <li class="active">
                @if(Route::currentRouteName() == 'units.edit')
                <a href="#1a" data-toggle="tab">Unit Edit</a>
                @else
                <a href="#1a" data-toggle="tab">Add unit</a>
                @endif

            </li>
            </li>
            @if(Route::currentRouteName() == 'units.edit')

            <li><a href="#3a" data-toggle="tab">Unit owner Edit</a>
            </li>
            <li><a href="#4a" data-toggle="tab">Resident</a>
            </li>
            @endif

        </ul>
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">

                <div class="row">

                    <div class="col-md-12">

                        <!-- ------ -->
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-transparent">
                                <strong>{{ $data['page_management']['title'] ?? "" }}</strong>
                            </div>

                            <div class="panel-body">
                                @if(!isset($unit->id))
                                {!! Form::open(array('route' => 'units.store','method'=>'POST', 'id' => 'units_form')) !!}
                                @else
                                {!! Form::model($unit, ['method' => 'PATCH','route' => ['units.update', $unit->id]]) !!}
                                @endif
                                <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                                <fieldset>
                                    <!-- required [php action request] -->
                                    <input type="hidden" id="block_hidden" value="{{ @$unit->block_id }}" />
                                    <div class="col-md-6">


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Unit Code</label>
                                                    {!! Form::text('unit_code', null, array('placeholder' => 'AUTO','class' => 'form-control','readonly'=>true )) !!}
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Unit Name *</label>
                                                    {!! Form::text('unit_name', null, array('placeholder' => 'Unit Name','class' => 'form-control' , 'id' => 'unit_name')) !!}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Project *</label>
                                                    <select id="project" class=" form-control" required name="project_id">
                                                        <option value=""></option>
                                                        @foreach($projects as $value)
                                                        <option id="projects" {{  $value->id== @$unit->project_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->project_name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Block *</label>
                                                    <select id="block" class=" form-control" required name="block_id">
                                                        <option value="">Select block</option>

                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Unit Category *</label>
                                                    <select class=" form-control" required name="unit_category_id">
                                                        <option></option>
                                                        @foreach($unit_categories as $value)
                                                        <option {{  $value->id== @$unit->unit_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Unit Size *</label>
                                                    {!! Form::number('unit_size', null, array('placeholder' => '','class' => 'form-control' , 'required'=>'true','type'=>'number')) !!}
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Outstanding Amount</label>
                                                    @php $readonly = (@$unit->id) ? 'readonly' : ''; @endphp
                                                    {!! Form::number('out_standing_amount',null, array('placeholder' => '','class' => 'form-control',$readonly=>true)) !!}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>OB Date</label>
                                                    {!! Form::text('ob_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker')) !!}
                                                </div>

                                            </div>
                                        </div>


                                    </div>




                                </fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                            <i class="fa fa-check"></i> Save
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /----- -->
                    </div>
                </div>
            </div>
            <div class="tab-pane    " id="3a">

                <div class="row">

                    <div class="col-md-12">

                        <!-- ------ -->
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-transparent">
                                <strong>{{ $data['page_management']['title'] ?? "" }}</strong>
                            </div>

                            <div class="panel-body">
                                <form id="myForm">
                                    @csrf
                                    <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                                    <fieldset>
                                        <!-- required [php action request] -->
                                        <input type="hidden" name="action" value="contact_send" />
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Unit *</label>
                                                        <select class=" form-control" required name="unit_id" id="unit_id">
                                                            <option value=""></option>
                                                            @foreach($units as $value)
                                                            <option {{  $value->id== @$unit_owner->unit_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Unit Owner Name *</label>
                                                        {!! Form::text('owner_name', $unit_owner['owner_name'] ?? null, array('placeholder' => 'Owner Name', 'class' => 'form-control', 'id' => 'owner_name', 'autocomplete' => 'off')) !!}
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="form-group">

                                                    <div class="col-md-3 " style="padding-right: 0px">
                                                        <label>Identity Type *</label>
                                                        <select class=" form-control" required name="identity_type" id="identity_type">
                                                            <option {{ $value->id== $unit_owner->identity_type ? 'selected' : '' }} value="cnic">CNIC</option>
                                                            <option {{ $value->id== $unit_owner->identity_type ? 'selected' : '' }} value="nicop">NICOP</option>

                                                            <option {{ $value->id== $unit_owner->identity_type ? 'selected' : '' }} value="passport">Passport</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label>CNIC / NICOP / Passport *</label>
                                                        {!! Form::text('owner_cnic', null, array('placeholder' => 'Identity','class' => 'form-control' ,'id' => 'owner_cnic','required'=>true,'autocomplete'=>'off')) !!}
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Mobile no *</label>
                                                        {!! Form::text('mobile_no',$unit_owner['mobile_no'] ?? null, array('placeholder' => 'Mobile no','class' => 'form-control', 'id' => 'mobile_no','autocomplete'=>'off')) !!}
                                                    </div>

                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>PTCL no</label>
                                                        {!! Form::text('ptcl_no',$unit_owner['ptcl_no'] ?? null, array('placeholder' => 'PTCL no','class' => 'form-control' , 'id' => 'ptcl_no','autocomplete'=>'off')) !!}
                                                    </div>

                                                </div>
                                            </div>





                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Email</label>
                                                        {!! Form::email('owner_email',$unit_owner['owner_email'] ?? null, array('placeholder' => 'Owner Email','class' => 'form-control', 'id' => 'owner_email','autocomplete'=>'off')) !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Owner Since *</label>
                                                        {!! Form::text('owner_since',$unit_owner['owner_since'] ?? null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker', 'id' => 'owner_since','autocomplete'=>'off')) !!}
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Current Resident *</label>
                                                        {!! Form::text('current_tenant',$unit_owner['current_tenant'] ?? null, array('placeholder' => 'Current Resident','class' => 'form-control','autocomplete'=>'off', 'id' => 'current_tenant','required'=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Is Tenant &nbsp&nbsp</label>
                                                        <input type="checkbox" <?= ($unit_owner->is_tenant == 1) ? 'checked' : '' ?> name="is_tenant" value="1">
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Address </label>
                                                        {!! Form::textarea('owner_address', null, array('placeholder' => 'Address','class' => 'form-control','rows'=>2)) !!}
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                                        <i class="fa fa-check"></i> Save
                                                    </button>
                                                </div>
                                            </div>

                                        </div>



                                    </fieldset>

                                    {!! Form::close() !!}

                                </form>
                            </div>
                        </div>
                        <!-- /-end---- -->
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="4a">
                <div class="col-md-12">

                    <!-- ------ -->
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>{{'residency'}}</strong>
                        </div>

                        <div class="panel-body">



                            <!-- {!! Form::model($unit_owner, ['method' => 'PATCH','route' => ['unit_owners.update', $unit_owner->id]]) !!} -->
                            <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                            <form id="resident">
                                @csrf
                                <fieldset>
                                    <!-- required [php action request] -->
                                    <input type="hidden" name="action" value="contact_send" />
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Unit *</label>
                                                    <select class=" form-control" required name="unit_id" id="unit_id">
                                                        <option value=""></option>
                                                        @foreach($units as $value)
                                                        <option {{  $value->id== @$unit_owner->unit_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Resident Name *</label>
                                                    {!! Form::text('resident_name', null, array('placeholder' => 'Resident Name','class' => 'form-control' ,'id' => 'resident_name')) !!}
                                                </div>

                                            </div>
                                        </div>






                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Resident CNIC *</label>
                                                    {!! Form::text('resident_cnic', null, array('placeholder' => 'Cnic','class' => 'form-control', 'id' => 'resident_cnic')) !!}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Mobile no *</label>
                                                    {!! Form::text('resident_mobile', null, array('placeholder' => 'Mobile no','class' => 'form-control', 'id' => 'resident_mobile')) !!}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Email *</label>
                                                    {!! Form::text('resident_email', null, array('placeholder' => 'Owner Email','class' => 'form-control', 'id' => 'resident_email')) !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Residing Since *</label>
                                                    {!! Form::date('residing_since', null, array('placeholder' => 'Residing Since','class' => 'form-control', 'id' => 'residing_since')) !!}
                                                </div>

                                            </div>
                                        </div>





                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-3d btn-teal btn-sm btn-block margin-top-30">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>

                                    </div>



                                </fieldset>

                            </form>
                        </div>
                    </div>
                    <!-- /-end---- -->
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    $('#myForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        // Your AJAX request
        $.ajax({
            type: "POST",
            url: '<?= env('APP_BASEURL') ?>/unit_owners_update',
            data: formData,
            success: function(response) {
                // Handle success response
                toastr.success('unit owner updated Succesfully');;
            },
            error: function(error) {
                // Handle error
                toastr.error('something wrong');;
            }
        });
    });
</script>
<script>
    $('#project').on('change', function() {
        var countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: '<?= env('APP_BASEURL') ?>/all_block/' + countryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#block').empty();
                    $.each(data, function(key, value) {
                        $('#block').append('<option value="' + value.id + '">' + value.block_name + '</option>');
                    });
                    $('#block').val($('#block_hidden').val()).trigger('change');;
                }
            });
        } else {
            $('#block').empty();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#projects').trigger('change');
    });
</script>


@include('units/validate')
@endsection