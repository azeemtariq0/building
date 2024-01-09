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
                    <strong>Receivable Report</strong>
                </div>

                <div class="panel-body">

                   {!! Form::open(array('url' => 'receivable-print','method'=>'GET','target'=>'_blank')) !!}
                    <fieldset>
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
                                                      <label>Unit Category </label>
                                                    <select class=" form-control web-select2"  name="unit_category_id">
                                                        <option></option>
                                                        @foreach($unit_categories as $value)
                                                        <option {{  $value->id== @$unit->unit_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                

                           <!--  <div class="form-group">
                                <div class="col-md-10 col-sm-10 mt-4">
                                    <label>From Date*</label>
                                    {!! Form::text('from_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker','required'=>true ,'autocomplete'=>'off')) !!}
                                </div>

                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group mt-4" >
                                <div class="col-md-10 col-sm-10 ">
                                    <label>To Date *</label>
                                   {!! Form::text('to_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker','required'=>true ,'autocomplete'=>'off')) !!}
                                </div>

                            </div>
                        </div> -->

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