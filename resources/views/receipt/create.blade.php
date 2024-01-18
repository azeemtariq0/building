@extends('layouts.app')


@section('content')
  @include('layouts.additionalscripts.adddatatable')
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
 @php 

 $project_id = auth()->user()->project_id;
 @endphp

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
                                            <select id="filter_project_id"  class=" form-control web-select2" required name="project_id">
                                                <option value=""></option>
                                                @foreach($projects as $value)
                                                <option  {{  $value->id== @$project_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->project_name}}</option>
                                                @endforeach


                                            </select>
                                            
                                        </div>
                                         <div class="col-md-3">
                                            <label>Block *</label>
                                            <select id="filter_block_id" onchange="reloadTbl(true)" class=" form-control select2" required name="block_id">
                                                <option value="">Select block</option>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Unit Category *</label>
                                            <select class="form-control select2" onchange="reloadTbl(true)" required id="filter_unit_category_id">
                                                <option></option>
                                                @foreach($unit_categories as $value)
                                                <option {{  $value->id== @$unit->unit_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <br>

                       

                        </fieldset>

                             <div class="table-responsive" style="margin-top: 20px">
                            <table class="table table-striped table-bordered table-hover table-responsive data-table mt-4" width="100%">
                                <thead>
                                  <tr>
                                    <th>Unit </th>
                                    <th>Unit Category </th>
                                    <th>Project </th>
                                    <th>Block </th>
                                    <th>Resident Name </th>
                                    <th width="8%">Outstanding</th>
                                    <th width="10%">Last Amount</th>
                                    <th width="10%">Last Date</th>
                                    <th width="10%">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                          </div>
                      
                       {!! Form::close() !!}
                   </div>
               </div>
               <!-- /----- -->
           </div>
       </div>
   </div>
          <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="form1" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Receipt</h4>
         <span class="text-success" id="resident"></span>
      </div>
      <div class="modal-body">
       
          <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-12">
                                 <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Receipt Type</label>
                                        <select id="receipt_type_id"  class=" form-control  col-md-12" required name="receipt_type_id">
                                                @foreach($receiptType as $type)
                                        <option  value="{{ $type->id}}">{{ $type->receipt_name}}</option>
                                          @endforeach
                                          </select>
                                      

                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        
                                            <label>Receipt Date</label>
                                            {!! Form::text('date', date('d-m-Y'), array('class' => 'form-control','id'=>'date' , 'readonly'=>'true','value'=>date('d-m-Y'))) !!}
                                       
                                        <input type="hidden" id="id" value="">

                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        
                                            <label>Monthly Amount</label>
                                            {!! Form::text('monthly_amount', null, array('class' => 'form-control','id'=>'monthly_amount' , 'readonly'=>'true')) !!}
                                       
                                        <input type="hidden" id="id" value="">

                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        
                                            <label>Outstanding Amount</label>
                                            {!! Form::text('outstanding_amount', null, array('class' => 'form-control','id'=>'outstanding_amount' , 'readonly'=>'true')) !!}
                                       
                                        <input type="hidden" id="id" value="">

                                    </div>
                                  </div>
                                  <div class="col-md-12
                                  ">
                                    <div class="form-group">
                                        
                                        <label>Receipt Amount</label>
                                            {!! Form::number('amount', null, array('placeholder' => 'Enter Amount','class' => 'form-control','id'=>'amount' , 'required'=>'true','value'=>0)) !!}
                                       
                                        <input type="hidden" id="unit_id" value="">
                                        <input type="hidden" id="project_id" value="">
                                        <input type="hidden" id="block_id" value="">
                                        <input type="hidden" id="unit_category_id" value="">

                                    </div>
                                  </div>
                                  <div class="col-md-12
                                  ">
                                    <div class="form-group">
                                        
                                        <label>Description</label>
                                            {!! Form::textarea('description', null, array('placeholder' => 'Add Description','class' => 'form-control','id'=>'description','rows'=>2 )) !!}
                                       
                                        <input type="hidden" id="id" value="">
                                      
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </fieldset>
                       
                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
    </div>

  </div>
</div>
   <script type="text/javascript">
     $(document).ready(function() {
     $('#filter_project_id').on('change', function() {
        $('#filter_block_id').empty();
        var projectId = $(this).val();
        if (projectId) {
            $.ajax({
                url: '<?= env('APP_BASEURL') ?>/all_block/'+projectId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    
                    $('#filter_block_id').append('<option value="">Select an option</option>');
                    $.each(data, function(key, value) {
                        $('#filter_block_id').append('<option value="' + value.id + '">' + value.block_name + '</option>');
                    });
                    reloadTbl(true);
                }
            });
        } else {
            $('#filter_block_id').empty();
        }
    });
});

</script>
<script type="text/javascript">
            $(function () {
              reloadTbl();
              $('#filter_project_id').trigger('change');
              $("#form1").submit(function (event) {
                    var formData = {
                      receipt_type_id: $("#receipt_type_id").val(),
                      amount: $("#amount").val(),
                      unit_id: $("#unit_id").val(),
                      project_id: $("#project_id").val(),
                      block_id: $("#block_id").val(),
                      unit_category_id: $("#unit_category_id").val(),
                      description: $("#description").val(),
                      _token: $("input[name=_token").val()
                    };
                    $.ajax({
                        type: "POST",
                        url: "{{url('add-receipt')}}",
                        data: formData,
                        dataType: "json",
                        encode: true,
                      }).done(function (data) {

                         $('input[type="search"]').val(' ').trigger('keyup');
                          $('#myModal').modal('hide');
                          reloadTbl(true);
                          toastr.success(data.msg);
                     
                      });
                    event.preventDefault();
                  });
            });

            function generateReceipt(obj,id){
                  $('#monthly_amount').val($(obj).data('monthly_amount'));
                  $('#outstanding_amount').val( $(obj).data('outstanding_amount'));
                  $('#project_id').val($(obj).data('project_id'));
                  $('#block_id').val($(obj).data('block_id'));
                  $('#unit_category_id').val($(obj).data('unit_category_id'));
                  $('#unit_id').val(id);
                  $('#resident').text($(obj).data('resident'));
                  $('#myModal').modal('show');
            }

            function reloadTbl(load=false){
              if(load){
                $('.data-table').DataTable().destroy();
              }
              var table = $('.data-table').DataTable({
                          processing: true,
                          serverSide: true,
                          ajax: {
                              url: "{{ url('get-units') }}",
                              type: "get",
                              data: function(f) {
                                  f.project_id = $('#filter_project_id').val(),
                                  f.block_id =  $('#filter_block_id').val(),
                                  f.unit_category_id =  $('#filter_unit_category_id').val()
                              }
                          },
                          columns: [
                          {data: 'unit_name', unit_name: 'name'},
                          {data: 'project.project_name', project_name: 'name'},
                          {data: 'block.block_name', block_id: 'name'},
                          {data: 'unit_category.unit_cat_name', unit_category_id: 'name'},
                          {data: 'name', out_standing_amount: 'name'},
                          {data: 'out_standing_amount', out_standing_amount: 'name'},
                          {data: 'receipt.last_amount', amount: 'name'},
                          {data: 'receipt.last_date', last_date: 'name'},
                          {data: 'action', description: 'action', orderable: false, searchable: false},
                          ]
              });
             }

          </script>
</div>
@include('receipt/validate')
@endsection


