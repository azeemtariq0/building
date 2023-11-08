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
                  @if(!isset($receiptType->id))
                   {!! Form::open(array('route' => 'receipt_types.store','method'=>'POST')) !!}
                   @else
                     {!! Form::model($receiptType, ['method' => 'PATCH','route' => ['receipt_types.update', $receiptType->id]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-12">


                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Project *</label>
                                            <select id="project" class=" form-control" required name="project_id">
                                                <option value=""></option>
                                                @foreach($projects as $value)
                                                <option id="projects" {{  $value->id== @$unit->project_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->project_name}}</option>
                                                @endforeach


                                            </select>
                                            
                                        </div>
                                         <div class="col-md-3">
                                            <label>Block *</label>
                                            <select id="block" class=" form-control" required name="block_id">
                                                <option value="">Select block</option>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
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

                            <table class="table table-striped table-bordered table-hover table-responsive data-table">
                                <thead>
                                  <tr>
                                    <th>Project </th>
                                    <th>Project Name</th>
                                    <th>Description</th>
                                    <th width="20%">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>

                        </fieldset>
                      
                       {!! Form::close() !!}
                   </div>
               </div>
               <!-- /----- -->
           </div>
       </div>
   </div>
</div>
@endsection


<script type="text/javascript">
     $(document).ready(function() {
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
                }
            });
        } else {
            $('#block').empty();
        }
    });
           });
</script>