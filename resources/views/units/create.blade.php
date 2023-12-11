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
</div>
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
// acript for trigger
<script>
    $(document).ready(function() {
        $('#projects').trigger('change');
    });
</script>


@include('units/validate')
@endsection