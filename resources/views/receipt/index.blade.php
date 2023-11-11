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
                    <li>
                      <a href="{{ route('receipts.create')}}" class="btn btn-sm btn-success btn_create_new_user">
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
                        <th>Receipt Code</th>
                        <th> receipt date </th>
                        <th> project </th>
                        <th> block </th>
                        <th> unit </th>
                        <th>Description</th>
                        <th> Receipt amount </th>
                        <th> status </th> 
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

          @section('pagelevelscript')
          <script type="text/javascript">
            $(function () {

              var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('receipts.index') }}",
                columns: [
                {data: 'receipt_code', receipt_code: 'name'},
                {data: 'project.project_name', project_id: 'name'},
                {data: 'block.block_name', block_id: 'name'},
                {data: 'unit.unit_name', unit_id: 'name'},
                {data: 'receipt_date', receipt_date: 'name'},
                {data: 'description', description: 'name'},
                {data: 'amount', amount: 'name'},
                {data: 'status', status: 'name'},
                {data: 'action', description: 'action', orderable: false, searchable: false},
                ]
              });

            });

            
          </script>

          <!-- Include jQuery library -->

          <script>
    $(document).ready(function() {
        $(document).on('change','.toggle-switch',function() {
            var id = $(this).data('id');
            var status = $(this).is(':checked') ? '1' : '0';

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
                },
                error: function(error) {
                    // Handle errors if any
                    console.log(error);
                }
            });
        });
    });
</script>
          @endsection

          
