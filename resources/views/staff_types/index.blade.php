  @extends('layouts.app')


@section('content')
  @include('layouts.additionalscripts.adddatatable')

  <div id="content" class="padding-20">

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
                    <li>
                      <a href="#" class="btn btn-sm btn-success btn_create_new_user add_staff">
                        <!-- <i class="et-megaphone"></i> -->
                        <span>{{ $data['page_management']['add'] ?? "" }}</span>
                      </a>
                    </li>
                    <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                    <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                    <li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
                  </ul>
                  <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">

                  <table class="table table-striped table-bordered table-hover table-responsive data-table">
                    <thead>
                      <tr>
                        <th>Staff Name</th>
                        <th width="20%">Action</th>
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
          @endsection



          <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="form1" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Staff Type Form</h4>
      </div>
      <div class="modal-body">
          <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-12">


                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Staff Type</label>
                                            {!! Form::text('staff_name', null, array('placeholder' => 'Staff Type','class' => 'form-control','id'=>'staff_name' , 'required'=>'true')) !!}
                                        </div>
                                        <input type="hidden" id="id" value="">

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


          @section('pagelevelscript')
          <script type="text/javascript">
            $(function () {

              var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('staff_types.index') }}",
                columns: [
                {data: 'staff_name', staff_name: 'name'},
                {data: 'action', description: 'action', orderable: false, searchable: false},
                ]
              });

              $(document).on('click','.add_staff',function(){
                $('#id').val('');
                $('#staff_name').val('');
                  $('#myModal').modal('show');
                  $('#id').val($(this).attr('data-id'));
                  if($(this).attr('data-id')){
                    $("#staff_name").val($(this).closest('tr').find('td:eq(0)').text());
                  }
              });


               $("#form1").submit(function (event) {
                    var formData = {
                      staff_name: $("#staff_name").val(),
                      id: $("#id").val(),
                      _token: $("input[name=_token").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "{{url('add_or_update_staff_type')}}",
                        data: formData,
                        dataType: "json",
                        encode: true,
                      }).done(function (data) {

                         $('input[type="search"]').val(' ').trigger('keyup');
                          $('#myModal').modal('hide');
                          table.ajax.reload();
                          toastr.success(data.msg);
                     
                      });
                    event.preventDefault();
                  });

            });
          </script>
          @endsection
