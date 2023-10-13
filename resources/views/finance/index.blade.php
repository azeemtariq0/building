@extends('layouts.app')


@section('content')
  <!-- /page title -->
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
                    <strong>MANAGE RESEARCH</strong> <!-- panel title -->
                  </span>

                  <!-- right options -->
                  <ul class="options pull-right list-inline">
                    <li>
                      <a href="{{ route('research.create')}}" class="btn btn-primary btn-xs white btn_create_new_user">
                        <!-- <i class="et-megaphone"></i> -->
                        <i class="fa fa-plus"></i>
                        <span>Upload Research</span>
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
                        <th>Symbol</th>
                        <th>Sector</th>
                        <th>Is Company</th>
                        <th>Is Sector</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Analyst</th>
                        <th>Type</th>
                        <th>View PDF</th>
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
                ajax: "{{ route('research.index') }}",
                columns: [
                {data: 'id', name: 'id'},
                {data: 'symbol', name: 'symbol'},
                {data: 'sector', name: 'sector'},
                {data: 'is_company', name: 'is_company'},
                {data: 'is_sector', name: 'is_sector'},
                {data: 'title', name: 'title'},
                {data: 'category', name: 'category'},
                {data: 'analyst', name: 'analyst'},
                {data: 'type', name: 'type'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
              });

            });
          </script>
          @endsection
