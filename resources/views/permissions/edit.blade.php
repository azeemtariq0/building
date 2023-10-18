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

        <div class="col-md-6">

            <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>Permission</strong>
                </div>

                <div class="panel-body">

                   {!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10">
                                    <label>Name *</label>
                                    <!--                                         <input type="text" name="contact[first_name]" value="" class="form-control required"> -->
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>

                            </div>
                        </div>
                        </fieldset>

                        <div class="row">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-3d btn-teal btn-sm btn-block margin-top-30">
                                   Submit
                               </button>
                           </div>
                       </div>

                       {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection