@extends('layouts.app')


@section('content')

 @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


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
                        <strong>FORM VALIDATION</strong>
                    </div>

                    <div class="panel-body">

                       {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                       <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                        <fieldset>
                            <!-- required [php action request] -->
                            <input type="hidden" name="action" value="contact_send" />

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Name *</label>
<!--                                         <input type="text" name="contact[first_name]" value="" class="form-control required"> -->
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Email *</label>
                                        <!-- <input type="email" name="contact[email]" value="" class="form-control required"> -->
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Password *</label>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Confirm Password *</label>
                                        <!-- <input type="text" name="contact[start_date]" value="" class="form-control datepicker required" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false"> -->
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Role *</label>
                                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
<!--                                         <select name="contact[position]" class="form-control pointer required">
                                            <option value="">--- Select ---</option>
                                            <option value="Marketing">PR &amp; Marketing</option>
                                            <option value="Developer">Web Developer</option>
                                            <option value="php">PHP Programmer</option>
                                            <option value="Javascript">Javascript Programmer</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>



                        </fieldset>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-3d btn-teal btn-xlg btn-block margin-top-30">
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