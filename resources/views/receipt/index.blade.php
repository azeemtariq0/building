@extends('layouts.app')


@section('content')
  @include('layouts.additionalscripts.adddatatable')

  <div id="content" class="padding-20">

          <!-- 
            PANEL CLASSES:
              panel-default
              panel-danger
              panel-warning
              panel-info
              panel-success

            INFO:   panel collapse - stored on user localStorage (handled by app.js _panels() function).
                All pannels should have an unique ID or the panel collapse status will not be stored!
              -->

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                  <span class="title elipsis">
                    <strong>{{ $data['page_management']['title'] ?? "" }}</strong> <!-- panel title -->
                  </span>

                  <!-- right options -->
                  <ul class="options pull-right list-inline">
                   @can('receipt-create')
                    <li>
                      <a href="{{ route('receipts.create')}}" class="btn btn-sm btn-success btn_create_new_user">
                        <!-- <i class="et-megaphone"></i> -->
                        <span>{{ $data['page_management']['add'] ?? "" }}</span>
                      </a>
                    </li>
                     @endcan
                    <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                    <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                    <li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
                  </ul>
                  <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">
                  <div class="col-md-3 mb-2" style="margin-bottom: 10px">
                     <strong>Status</strong>
                  <select class="form-control select2" id="status">
                    <option value="">All</option>
                    <option value="0">Pending</option>
                    <option value="1">Approved</option>
                  </select>
                </div>
                @can('receipt-approve')
                 <div class="col-md-3 mb-2" style="margin-bottom: 10px">
                     <strong>Total Amount</strong>
                  <input class="form-control" id="total_amount" readonly value="0" />
                  <label class="text-danger _error"></label>
                </div>
                <div class="col-md-3 mb-2" style="margin-bottom: 10px;margin-top: 20px">
                  <button class="btn btn-success mt-4" onclick="payAmount()"  />Pay Amount</div>
                @endcan
             
                  <table class="table table-striped table-bordered table-hover table-responsive data-table" width="100%">
                    <thead>
                      <tr>
                        <th width="8%">Receipt Code</th>
                        <th width="12%"> Receipt Type </th>
                        <th width="100"> 
                        Receipt date </th>
                        <th width="400px"> Project Name</th>
                        <th> Block </th>
                        <th> Unit </th>
                        <th>Description</th>
                        <th width="8%">Amount </th>
                        <th width="11%">
                           @can('receipt-approve')
                          <input type="checkbox" onclick="checkAll(this)" id="all_check"> 
                          @endcan
                           Approved ? </th> 
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                </div>
                <!-- /panel content -->

              </div>
              <!-- /PANEL -->

            </div>






            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="form1" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Receipt</h4>
        <span class="text-success" id="resident"></span>
      </div>
      <div class="modal-body">
          <fieldset>
                        <!-- required [php action request] -->
              
                         <div class="col-md-12">
                                 <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Receipt Type</label>
                                        <select id="receipt_type_id"  class=" form-control  col-md-12" required name="receipt_type_id">
                                          <option value=""></option>
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
                                       
                                        <input type="hidden" id="id" value="">
                                      
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

          @endsection

          @section('pagelevelscript')
       

          <!-- Include jQuery library -->

          <script>


    function checkAll(obj){
       if($(obj).is(':checked')==true){
         $('table .toggle-switch_pending').prop('checked',true);

       }else{
        $('table .toggle-switch_pending').prop('checked',false);
       }
       calculteAmount();
    }

    function calculteAmount(){
      var amount = 0;
        $.each( $('table .toggle-switch_pending:checked'),function(i,elem){
          amount += parseInt($(elem).data('amount'));
        });
      $('#total_amount').val(amount || 0);
    }

    $(document).ready(function() {
      reloadTbl();
         $("#form1").submit(function (event) {
                    var formData = {
                      receipt_type_id: $("#receipt_type_id").val(),
                      description: $("#description").val(),
                      amount: $("#amount").val(),
                      id: $("#id").val(),
                      _token: $("input[name=_token").val()
                    };
                    $.ajax({
                        type: "POST",
                        url: "{{url('add-receipt')}}",
                        data: formData,
                        dataType: "json",
                        encode: true,
                      }).done(function (data) {
                          $('#myModal').modal('hide');
                          reloadTbl(true);
                          toastr.success(data.msg);
                     
                      });
                    event.preventDefault();
                  });

        // $(document).on('change','.toggle-switch',function() {
        $(document).on('change','.toggle-switch',function() {
            var object = $(this);
            var id = $(this).data('id');
            var status = $(this).is(':checked') ? '1' : '0';

        swal({
             title: "Are you sure?",
             text: "Do you want to approve this Receipt ?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
          .then((willConfirm) => {
               if (willConfirm) {
                  $.ajax({
                    type: 'POST',
                    url: '{{ url("receipt-status") }}', // Update with your actual endpoint
                    data: {
                        id: id,
                        status: status,
                        _token: $("input[name=_token").val()
                    },
                     dataType: "json",
                     encode: true,
                    success: function(response) {

                          toastr.success(response.msg);
                          reloadTbl(true);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
               }else{
                   if(status==1)
                      $(object).prop("checked" , false);
                   else
                      $(object).prop("checked" , true);
               }    
        });
        });

    });

        function  payAmount(){
          $('._error').text();
          if($('#total_amount').val()==0){
              $('._error').text('Total amount should be greater than zero!');
          }else{
            swal({
               title: "Are you sure?",
               text: "Do you want to approve this Receipt ?",
               icon: "warning",
               buttons: true,
               dangerMode: false,
             })
            .then((willConfirm) => {
                 if (willConfirm) {

                  var ids = {};
                  $.each( $('table .toggle-switch_pending:checked'),function(i,elem){
                    ids[i] = $(elem).data('id');
                  });
                    $.ajax({
                      type: 'POST',
                      url: '{{ url("receipt-status") }}', // Update with your actual endpoint
                      data: {
                          id: ids,
                          _token: $("input[name=_token").val()
                      },
                       dataType: "json",
                       encode: true,
                      success: function(response) {

                            toastr.success(response.msg);
                            reloadTbl(true);
                      },
                      error: function(error) {
                          console.log(error);
                      }
                  });
                 }
          });
        }
}

    function rowDetele(event) {
         event.preventDefault(); // prevent form submit
             swal({
             title: "Are you sure?",
             text: "Do You Want to Delete This Record!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
          .then((willDelete) => {
               if (willDelete) {
                  $('#delete-form').submit()
               }
            });
    }


    
            function reloadTbl(load=false){
              if(load){
                $('.data-table').DataTable().destroy();
              }
               var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url: "{{ route('receipts.index') }}",
                   complete: function (data) {
                        calculteAmount();
                        $('#all_check').prop('checked',false);
                    },
                data: function (d) {
                    d.status = $('#status').val()
                }},
                columns: [
                {data: 'receipt_code', receipt_code: 'name'},
                {data: 'receipt_type.receipt_name', receipt_code: 'name'},
                {data: 'receipt_date', receipt_date: 'name'},
                {data: 'project.project_name', project_id: 'name'},
                {data: 'block.block_name', block_id: 'name'},
                {data: 'unit.unit_name', unit_id: 'name'},
                {data: 'description', description: 'name'},
                {data: 'amount', amount: 'name'},
                {data: 'status', status: 'name',orderable: false, searchable: false},
                {data: 'action', description: 'action', orderable: false, searchable: false},
                ]
              });
                
             }

              function ediReceipt(obj,id){
                  var is_view = $(obj).data('view');
                  $('#myModal').find('button[type="submit"]').show();
                   $("#myModal input,select,textarea").attr('readonly',false);

                  $('#monthly_amount').val($(obj).data('monthly_amount')).attr('readonly',true);
                  $('#outstanding_amount').val( $(obj).data('outstanding_amount')).attr('readonly',true);
                  $('#amount').val( $(obj).data('amount'));
                  $('#receipt_date').val( $(obj).data('date'));
                  $('#description').val( $(obj).data('description'));
                  $('#receipt_type_id').val( $(obj).data('receipt_type_id'));
                  $('#resident').text($(obj).data('resident'));
                  $('#id').val(id);
                  $('#myModal').modal('show');
                  if(is_view==1){
                    $('#myModal').find('button[type="submit"]').hide();
                    $("#myModal input,select,textarea").attr('readonly',true);
                  }
            }

            $(document).on('change','#status',function() {
                $('table th:eq(1)').trigger('click');
            });

</script>
          @endsection

          
