@extends('layouts.app')


@section('content')

@if (count($errors) > 0)
<div id="content" class="padding-20">

    <div class="alert alert-danger margin-bottom-30">
        <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif


   <div id="content" class="padding-20">

    <div class="row">

        <div class="col-md-6">

            <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>Defaulter List Report</strong>
                </div>

                <div class="panel-body">

                   {!! Form::open(array('url' => 'defaulter-print','method'=>'GET','target'=>'_blank')) !!}
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />

                        <div class="row">
                             <div class="col-md-12">
                                                    <label>Project Name</label>
                                                    <select id="project" class=" form-control web-select2"  name="project_id">
                                                        <option value=""></option>
                                                        @foreach($projects as $value)
                                                        <option  {{  $value->id== @$unit->project_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->project_name}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>




                                                <div class="col-md-12" style="margin-top:10px ">
                                                    <label>Block </label>
                                                    <select id="block" class="web-select2 form-control"  name="block_id">
                                                        <option value="">Select block</option>

                                                    </select>
                                                </div>


                                                <div class="col-md-12" style="margin-top:10px ">
                                                      <label>Unit Category</label>
                                                    <select class=" form-control web-select2"  name="unit_category_id">
                                                        <option></option>
                                                        @foreach($unit_categories as $value)
                                                        <option {{  $value->id== @$unit->unit_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="col-md-12" style="margin-top:10px ">
                                                     <input type="radio" checked name="report_type" id="day_wise" value="1">
                                                      <label for="day_wise">Greater Than 90 Days</label>&nbsp&nbsp&nbsp
                                                     <input type="radio" name="report_type" id="amount_wise" value="2">
                                                     <label for="amount_wise"> Amount Greater Than 10 Thousand</label>
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
                     $('#block').append('<option value=""></option>');
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
@endsection