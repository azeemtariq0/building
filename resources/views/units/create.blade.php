@extends('layouts.app')


@section('content')
<?php  $isView = (@$unit->is_view==1) ? 'readonly' : '';   ?>
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
        <div class="tab-content clearfix">

                    <ul class="nav nav-pills ">
            <li class="active">
                @if(Route::currentRouteName() != 'units.create')
                <a href="#1a" data-toggle="tab">Unit</a>
                @else
                <a href="#1a" data-toggle="tab">Add unit</a>
                @endif

            </li>
            </li>
            @if(Route::currentRouteName() != 'units.create')

            <li><a href="#3a" data-toggle="tab">Unit Owner </a>
            </li>
            <li><a href="#4a" data-toggle="tab">Resident</a>
            </li>
            @endif

        </ul>

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
                                {!! Form::model($unit, ['id'=>'units_form','method' => 'PATCH','route' => ['units.update', $unit->id]]) !!}
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
                                                    <label>Unit Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('unit_name', null, array('placeholder' => 'Unit Name','class' => 'form-control' , 'id' => 'unit_name',$isView=>true)) !!}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Project Name <span class="text-danger">*</span></label>
                                                    <select id="project" class=" form-control web-select2" {{$isView}} required name="project_id">
                                                        <option value=""></option>
                                                        @foreach($projects as $value)
                                                        <option  {{  $value->id== @$unit->project_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->project_name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Block <span class="text-danger">*</span></label>
                                                    <select id="block" class="web-select2 form-control" required name="block_id" {{$isView}}>
                                                        <option value="">Select block</option>

                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Unit Category <span class="text-danger">*</span></label>
                                                    <select class=" form-control web-select2" required name="unit_category_id" {{$isView}}>
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
                                            <div class="col-md-3 col-sm-3">
                                                    <label>Unit Size Type <span class="text-danger">*</span></label>
                                                    <select id="unit_size_id" class=" form-control" required name="unit_size_type_id" {{$isView}}>
                                                        @foreach($unit_size as $value)
                                                        <option {{  $value->id== @$unit->unit_size_type_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->title}}</option>
                                                        @endforeach
                                                    </select>                                        
                                                </div>
                                                <div class="col-md-7 col-sm-7">
                                                    <label>Unit Size <span class="text-danger">*</span></label>
                                                    {!! Form::number('unit_size', null, array('placeholder' => '','class' => 'form-control' , 'required'=>'true','type'=>'number',$isView=>true)) !!}
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
                                                    {!! Form::text('ob_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker',$isView=>true)) !!}
                                                </div>

                                            </div>
                                        </div>


                                    </div>




                                </fieldset>



                                           @if($isView=="")
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                                           <i class="fa fa-check"></i> Save
                                                       </button>
                                                   </div>
                                               </div>
                                                @endif
                                           
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /----- -->
                    </div>
                </div>
            </div>
            @if(Route::currentRouteName() != 'units.create')

            <div class="tab-pane    " id="3a">

                <div class="row">

                    <div class="col-md-12">

                        <!-- ------ -->
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-transparent">
                                <strong>{{ $data['page_management']['title1'] ?? "" }}</strong>
                            </div>

                            <div class="panel-body">
                                <form id="unit_owner_form">
                                    @csrf
                                    <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                                    <fieldset>
                                        <!-- required [php action request] -->
                                        <input type="hidden" name="action" value="contact_send" />
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Unit Name<span class="text-danger">*</span></label>
                                                        <select class=" form-control" readonly required name="unit_id" id="unit_id">
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
                                                        <label>Unit Owner Name <span class="text-danger">*</span></label>
                                                        {!! Form::text('owner_name', $unit_owner['owner_name'] ?? null, array('placeholder' => 'Owner Name', 'class' => 'form-control', 'id' => 'owner_name', 'autocomplete' => 'off',$isView=>true)) !!}
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-3" style="padding-right: 0px">
                                                        <label>Identity Type <span class="text-danger">*</span></label>
                                                        <select class="form-control" required name="identity_type" id="identity_type" {{$isView}}>
                                                            <option value="cnic" {{ @$unit_owner->identity_type == 'cnic' ? 'selected' : '' }}>CNIC</option>
                                                            <option value="nicop" {{ @$unit_owner->identity_type == 'nicop' ? 'selected' : '' }}>NICOP</option>
                                                            <option value="passport" {{ @$unit_owner->identity_type == 'passport' ? 'selected' : '' }}>Passport</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label>CNIC / NICOP / Passport <span class="text-danger">*</span></label>
                                                        {!! Form::text('owner_cnic', $unit_owner->owner_cnic ?? null, array('placeholder' => 'Identity','class' => 'form-control' ,'id' => 'owner_cnic','required'=>true,'autocomplete'=>'off',$isView=>true)) !!}
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Mobile no <span class="text-danger">*</span></label>
                                                        {!! Form::text('mobile_no',$unit_owner['mobile_no'] ?? null, array('placeholder' => 'Mobile no','class' => 'form-control', 'id' => 'mobile_no','autocomplete'=>'off',$isView=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>PTCL no</label>
                                                        {!! Form::text('ptcl_no',$unit_owner['ptcl_no'] ?? null, array('placeholder' => 'PTCL no','class' => 'form-control' , 'id' => 'ptcl_no','autocomplete'=>'off',$isView=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>





                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Email</label>
                                                        {!! Form::email('owner_email',$unit_owner['owner_email'] ?? null, array('placeholder' => 'Owner Email','class' => 'form-control', 'id' => 'owner_email','autocomplete'=>'off',$isView=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Owner Since <span class="text-danger">*</span></label>
                                                        {!! Form::text('owner_since',$unit_owner['owner_since'] ?? null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker', 'id' => 'owner_since','autocomplete'=>'off',$isView=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Current Resident <span class="text-danger">*</span></label>
                                                        {!! Form::text('current_tenant',$unit_owner['current_tenant'] ?? null, array('placeholder' => 'Current Resident','class' => 'form-control','autocomplete'=>'off', 'id' => 'current_tenant','required'=>true,$isView=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Is Resident &nbsp&nbsp</label>
                                                        <input type="checkbox" <?= (@$unit_owner->is_tenant == 1) ? 'checked' : '' ?> name="is_tenant" value="1">
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-10 col-sm-10">
                                                        <label>Address </label>
                                                        {!! Form::textarea('owner_address',$unit_owner['owner_address'] ?? null, array('placeholder' => 'Address','class' => 'form-control','rows'=>2,$isView=>true)) !!}
                                                    </div>

                                                </div>
                                            </div>




                                           @if($isView=="")
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                                           <i class="fa fa-check"></i> Save
                                                       </button>
                                                   </div>
                                               </div>
                                                @endif
                                       

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
                            <strong>{{ $data['page_management']['title2'] ?? "" }}</strong>
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
                                                    <label>Unit Name<span class="text-danger">*</span></label>
                                                    <select readonly class=" form-control" readonly required name="unit_id" id="unit_id">
                                                        <option value=""></option>
                                                        @foreach($units as $value)
                                                        <option {{  $value->id== @$unit_owner->unit_id ? 'selected' : '' }} value="{{ @$value->id}}">{{ $value->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Resident Name <span class="text-danger">*</span></label>
                                                    {!! Form::text('resident_name',$unit_resident['resident_name'] ?? null, array('placeholder' => 'Resident Name','class' => 'form-control' ,'id' => 'resident_name',$isView=>true)) !!}
                                                </div>

                                            </div>
                                        </div>




                                <div class="row">
                                    <div class="form-group">
                                        
                                        <div class="col-md-3 " style="padding-right: 0px">
                                            <label>Identity Type <span class="text-danger">*</span></label>
                                            <select class=" form-control" required name="identity_type" id="identity_type">
                                              <option {{ $value->id== @$unit_resident->identity_type ? 'selected' : '' }} value="cnic">CNIC</option>
                                            <option {{ $value->id== @$unit_resident->identity_type ? 'selected' : '' }} value="nicop">NICOP</option>
                                            
                                            <option {{ $value->id== @$unit_resident->identity_type ? 'selected' : '' }} value="passport">Passport</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7">
                                            <label>CNIC / NICOP / Passport <span class="text-danger">*</span></label>
                                             {!! Form::text('resident_cnic', $unit_resident['resident_cnic'] ?? null, array('placeholder' => 'Cnic','class' => 'form-control', 'id' => 'resident_cnic',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>
                                   


                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Mobile no <span class="text-danger">*</span></label>
                                                    {!! Form::text('resident_mobile', $unit_resident['resident_mobile'] ?? null, array('placeholder' => 'Mobile no','class' => 'form-control', 'id' => 'resident_mobile',$isView=>true)) !!}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Email</label>
                                                    {!! Form::text('resident_email',$unit_resident['resident_email'] ?? null, array('placeholder' => 'Owner Email','class' => 'form-control', 'id' => 'resident_email',$isView=>true)) !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-10 col-sm-10">
                                                    <label>Residing Since <span class="text-danger">*</span></label>
                                                    {!! Form::text('residing_since',$unit_resident['residing_since'] ?? null , array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker', 'id' => 'residing_since',$isView=>true)) !!}
                                                </div>

                                            </div>
                                        </div>





                                           @if($isView=="")
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                                           <i class="fa fa-check"></i> Save
                                                       </button>
                                                   </div>
                                               </div>
                                                @endif
                                               {!! Form::close() !!}
                                    </div>



                                </fieldset>

                            </form>
                        </div>
                    </div>
                    <!-- /-end---- -->
                </div>
            </div>


            @endif


        </div>
    </div>
</div>
<script>
    $('#unit_owner_form').on('submit', function(e) {
         e.preventDefault();
        var formData = $(this).serialize();
      
        // Your AJAX request
        if($("#unit_owner_form").valid()){
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
       }
    });
</script>
<script>
    $('#resident').on('submit', function(e) {
        e.preventDefault();


          $("#resident").validate({
      rules: {
        resident_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        identity_type: {
          required: true,
        },
        resident_cnic: {
          required: true,
        },
        project_id: {
          required: true,
        },
        resident_mobile:{
          required: true,
          noSpace: true // Use the custom rule
        },
        email:{
          required: true,
          noSpace: true
        }
      },
      messages: {
        resident_mobile: {
          required: "Resident Mobile field is required."
        }, 
        resident_name: {
          required: "Resident Mobile field is required."
        }, 
        email: {
          required: "Email field is required."
        }
        
      },
        errorPlacement: function(label, element) {
      if (element.hasClass('web-select2')) {
        label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
        select2label = label
      } else {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      }
      },
      highlight: function(element) {
        $(element).parent().addClass('is-invalid')
        $(element).addClass('form-control-danger')
      },
      success: function(label, element) {
        $(element).parent().removeClass('is-invalid')
        $(element).removeClass('form-control-danger')
        label.remove();
      },
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#units_form' ).submit();
      }
    });

        var formData = $(this).serialize();
       if($("#resident").valid()==true){
        // Your AJAX request
            $.ajax({
                type: "POST",
                url: '<?= env('APP_BASEURL') ?>/resideny-update',
                data: formData,
                success: function(response) {
                    // Handle success response
                    toastr.success('resident owner updated Succesfully');;
                },
                error: function(error) {
                    // Handle error
                    toastr.error('something wrong');;
                }
            });
        }
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
        $('#project').trigger('change');
    });
</script>


@include('units/validate')
@endsection