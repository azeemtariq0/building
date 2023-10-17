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
                  @if(!isset($unit_owner->id))
                   {!! Form::open(array('route' => 'unit_owners.store','method'=>'POST')) !!}
                   @else
                     {!! Form::model($unit_owner, ['method' => 'PATCH','route' => ['unit_owners.update', $unit_owner->id]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-6">
                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Unit *</label>
                                        <select class="select2 form-control" required name="unit_id">
                                            <option value=""></option>
                                            @foreach($units as $value)
                                               <option {{  $value->id== @$unit_owner->unit_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->unit_name}}</option>
                                               @endforeach
                                           </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Unit Owner Name *</label>
                                            {!! Form::text('owner_name', null, array('placeholder' => 'Owner Name','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>CNIC *</label>
                                            {!! Form::text('owner_cnic', null, array('placeholder' => 'Owner CNIC','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>


                                  <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Contact *</label>
                                            {!! Form::text('owner_contact', null, array('placeholder' => 'Owner Contact','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>




                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Email *</label>
                                            {!! Form::text('owner_email', null, array('placeholder' => 'Owner Email','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Owner Since *</label>
                                            {!! Form::text('owner_since', null, array('placeholder' => 'Owner Since','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Address *</label>
                                            {!! Form::text('owner_address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>

                                

                            </div>



                        </fieldset>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-3d btn-teal btn-sm btn-block margin-top-30">
                                   Submit
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
@endsection