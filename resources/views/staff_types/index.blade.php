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
                        <th>No</th>
                        <th>Receipt Type Code</th>
                        <th>Receipt Type Name</th>
                        <th>Description</th>
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
                                            {!! Form::text('staff_type_name', null, array('placeholder' => 'Staff_type','class' => 'form-control' , 'required'=>'true')) !!}
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </fieldset>
                       
                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
      </div>
    </div>

  </div>
</div>


          @section('pagelevelscript')
          <script type="text/javascript">
            $(function () {

              var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('receipt_types.index') }}",
                columns: [
                {data: 'id', receipt_code: 'id'},
                {data: 'receipt_code', receipt_code: 'name'},
                {data: 'receipt_name', receipt_name: 'name'},
                {data: 'description', description: 'name'},
                {data: 'action', description: 'action', orderable: false, searchable: false},
                ]
              });

              $('.add_staff').on('click',function(){
                  $('#myModal').modal('show');
              });
            });
          </script>
          @endsection
