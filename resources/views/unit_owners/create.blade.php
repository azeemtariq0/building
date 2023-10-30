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
                   {!! Form::open(array('route' => 'unit_owners.store','method'=>'POST', 'id' => 'unit_owners')) !!}
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
                                        <select class=" form-control" required name="unit_id" id="unit_id">
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
                                            {!! Form::text('owner_name', null, array('placeholder' => 'Owner Name','class' => 'form-control' ,'id' => 'owner_name')) !!}
                                        </div>

                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>CNIC / NICOP / Passport *</label>
                                            {!! Form::text('owner_cnic', null, array('placeholder' => 'Owner CNIC','class' => 'form-control' ,'id' => 'owner_cnic','required'=>true)) !!}
                                        </div>

                                    </div>
                                </div>


                                  <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Mobile no *</label>
                                            {!! Form::text('mobile_no', null, array('placeholder' => 'Mobile no','class' => 'form-control', 'id' => 'mobile_no')) !!}
                                        </div>

                                    </div>
                                </div>



                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>PTCL no *</label>
                                            {!! Form::text('ptcl_no', null, array('placeholder' => 'PTCL no','class' => 'form-control' , 'id' => 'ptcl_no')) !!}
                                        </div>

                                    </div>
                                </div>





                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Email *</label>
                                            {!! Form::text('owner_email', null, array('placeholder' => 'Owner Email','class' => 'form-control', 'id' => 'owner_email')) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Owner Since *</label>
                                            {!! Form::date('owner_since', null, array('placeholder' => 'Owner Since','class' => 'form-control', 'id' => 'owner_since')) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Current Tenant</label>
                                            {!! Form::text('current_tenant', null, array('placeholder' => 'Current Tenant','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Address </label>
                                            {!! Form::textarea('owner_address', null, array('placeholder' => 'Address','class' => 'form-control','rows'=>2)) !!}
                                        </div>

                                    </div>
                                </div>

                                  <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-3d btn-teal btn-sm btn-block margin-top-30">
                                           Submit
                                       </button>
                                   </div>
                               </div>

                            </div>



                        </fieldset>
                      
                       {!! Form::close() !!}
                   </div>
               </div>
               <!-- /----- -->
           </div>
       </div>
   </div>
</div>
@include('unit_owners/validate')
@endsection