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
                  @if(!isset($unitCategory->id))
                   {!! Form::open(array('route' => 'unit_categories.store','method'=>'POST', 'id' => 'unit_form')) !!}
                   @else
                     {!! Form::model($unitCategory, ['method' => 'PATCH','route' => ['unit_categories.update', $unitCategory->id]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-6">


                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Unit Category Code</label>
                                            {!! Form::text('unit_cat_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Unit Category *</label>
                                            {!! Form::text('unit_cat_name', null, array('placeholder' => 'Unit Cat Name','class' => 'form-control' , 'id' => 'unit_cat_name')) !!}
                                        </div>

                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Monthly Amount *</label>
                                            {!! Form::text('monthly_amount', null, array('placeholder' => 'Monthly Amount','class' => 'form-control', 'id' => 'monthly_amount')) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Description </label>
                                            {!! Form::textarea('description', null, array('placeholder' => 'Descreption','class' => 'form-control','rows'=>2)) !!}
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
@include('unit_categories/validate');
@endsection