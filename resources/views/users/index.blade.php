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
          <strong>LIST USERS</strong> <!-- panel title -->
        </span>

        <!-- right options -->
        <ul class="options pull-right list-inline">
          <li>
            <a href="{{ route('users.create')}}" class="btn btn-sm btn-success btn_create_new_user">
              <!-- <i class="et-megaphone"></i> -->
              <span>Create New User</span>
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
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
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
        <h4 class="modal-title">Assign Role</h4>
      </div>
      <div class="modal-body">
          <fieldset>
            <input type="hidden" name="action" value="contact_send" />
                 <div class="col-md-12">
                         <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-10">
                                    <label>Current Role</label>
                                    {!! Form::text('current_role', null, array('placeholder' => 'current_role','id'=>'current_role','class' => 'form-control' , 'readonly'=>'true')) !!}
                                </div>
                                <div class="col-md-6 col-sm-10">
                                    <label class="col-md-12">New Role</label>
                                    <select required name="role_id" id="role_id" class=" form-control col-md-12">
                                      <option value=""></option>
                                      @foreach($role_list as $value)
                                       <option value="{{$value->id}}">{{$value->name}}</option>
                                      @endforeach
                                     
                                    </select>
                                </div>
                                <input type="hidden" id="id" value="">

                            </div>
                        </div>
                    </div>
            </fieldset>
                       
                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Submit</button>
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
      ajax: "{{ route('users.index') }}",
      columns: [
      {data: 'name', name: 'name'},
      {data: 'email', name: 'email'},
      {data: 'roles', name: 'roles'},
      {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });

   
              $(document).on('click','.assign_role',function(){
                $('#id').val('');
                $('#role_id').val('');
                  $('#myModal').modal('show');
                  $('#id').val($(this).attr('data-id'));
                  $('#current_role').val($(this).closest('tr').find('.current_role').text());
                  
              });


               $("#form1").submit(function (event) {
                    var formData = {
                      role_id: $("#role_id").val(),
                      id: $("#id").val(),
                      _token: $("input[name=_token").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "{{url('assign_role')}}",
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