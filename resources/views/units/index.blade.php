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
                      <a href="{{ route('units.create')}}" class="btn btn-sm btn-success btn_create_new_user">
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
                        <th width="100">Unit Code</th>
                        <th>Unit</th>
                        <th>Project</th>
                        <th>Block</th>
                        <th width="120">Unit Category</th>
            
                        <th width="150">Outstanding Amount</th>
                      
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
                ajax: "{{ route('units.index') }}",
                columns: [
                {data: 'unit_code', unit_code: 'name'},
                {data: 'unit_name', unit_name: 'name'},
                {data: 'project.project_name', project_name: 'name'},
                {data: 'block.block_name', block_id: 'name'},
                {data: 'unit_category.unit_cat_name', unit_category_id: 'name'},
                {data: 'out_standing_amount', out_standing_amount: 'name'},
                {data: 'action', description: 'action', orderable: false, searchable: false},
                ]
              });



            });
          </script>
          @endsection
