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
                                            {!! Form::text('owner_name', null, array('placeholder' => 'Owner Name','class' => 'form-control' ,'id' => 'owner_name','autocomplete'=>'off')) !!}
                                        </div>

                                    </div>
                                </div> 

          
                               
                                <div class="row">
                                    <div class="form-group">
                                        
                                        <div class="col-md-3 " style="padding-right: 0px">
                                            <label>Identity Type *</label>
                                            <select class=" form-control" required name="identity_type" id="identity_type">
                                              <option {{ $value->id== @$unit_owner->identity_type ? 'selected' : '' }} value="cnic">CNIC</option>
                                            <option {{ $value->id== @$unit_owner->identity_type ? 'selected' : '' }} value="nicop">NICOP</option>
                                            
                                            <option {{ $value->id== @$unit_owner->identity_type ? 'selected' : '' }} value="passport">Passport</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7">
                                            <label>CNIC / NICOP / Passport *</label>
                                            {!! Form::text('owner_cnic', null, array('placeholder' => 'Identity','class' => 'form-control' ,'id' => 'owner_cnic','required'=>true,'autocomplete'=>'off')) !!}
                                        </div>

                                    </div>
                                   
                                </div>


                                  <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Mobile no *</label>
                                            {!! Form::text('mobile_no', null, array('placeholder' => 'Mobile no','class' => 'form-control', 'id' => 'mobile_no','autocomplete'=>'off')) !!}
                                        </div>

                                    </div>
                                </div>



                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>PTCL no</label>
                                            {!! Form::text('ptcl_no', null, array('placeholder' => 'PTCL no','class' => 'form-control' , 'id' => 'ptcl_no','autocomplete'=>'off')) !!}
                                        </div>

                                    </div>
                                </div>





                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Email</label>
                                            {!! Form::email('owner_email', null, array('placeholder' => 'Owner Email','class' => 'form-control', 'id' => 'owner_email','autocomplete'=>'off')) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Owner Since *</label>
                                            {!! Form::text('owner_since', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker', 'id' => 'owner_since','autocomplete'=>'off')) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Current  Resident *</label>
                                            {!! Form::text('current_tenant', null, array('placeholder' => 'Current Resident','class' => 'form-control','autocomplete'=>'off', 'id' => 'current_tenant','required'=>true)) !!}
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Is Tenant &nbsp&nbsp</label>
                                            <input type="checkbox" <?= (@$unit_owner->is_tenant==1) ? 'checked' : '' ?> name="is_tenant" value="1">
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
                                    <div class="col-md-12">
                                        <button type="submit" onclick="save()" class="btn btn-info margin-top-30 pull-right">
                                           <i class="fa fa-check"></i> Save
                                       </button>
                                   </div>
                               </div>

                            </div>



                        </fieldset>
                      
                       {!! Form::close() !!}
                   </div>
               </div>
               <!-- /-end---- -->
           </div>
       </div>
   </div>
</div>
@include('unit_owners/validate')
@endsection