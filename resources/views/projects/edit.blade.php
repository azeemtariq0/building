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
                    <strong>Projects</strong>
                </div>

                <div class="panel-body">

                   {!! Form::model($project, ['method' => 'PATCH','route' => ['projects.update', $project->id]]) !!}
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />

                         <div class="col-md-6">


                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Project Code *</label>
                                            {!! Form::text('project_code', null, array('placeholder' => 'Project Code','class' => 'form-control' , 'required'=>'true','readonly'=>'true')) !!}
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Project Name *</label>
                                            {!! Form::text('project_name', null, array('placeholder' => 'Project Name','class' => 'form-control')) !!}
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


                                     <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Name *</label>
                                            {!! Form::text('union_name', null, array('placeholder' => 'Union Name','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union President </label>
                                            {!! Form::text('union_president', null, array('placeholder' => 'Union President','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>
                                     <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Voice President </label>
                                            {!! Form::text('union_voice_president', null, array('placeholder' => 'Union Voice President','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Secretary </label>
                                            {!! Form::text('union_secretary', null, array('placeholder' => 'Union Secretary','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Joint Secretary </label>
                                            {!! Form::text('union_joint_secretary', null, array('placeholder' => 'Union Joint Secretary','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>



                            </div>


                            <div class="col-md-6">

                           

                            
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Accountant </label>
                                            {!! Form::text('union_accountant', null, array('placeholder' => 'Union Accountant','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 1</label>
                                            {!! Form::text('union_other_1', null, array('placeholder' => 'Union Other 1','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 1</label>
                                            {!! Form::text('union_other_2', null, array('placeholder' => 'Union Other 2','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 3</label>
                                            {!! Form::text('union_other_3', null, array('placeholder' => 'Union Other 3','class' => 'form-control')) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 4</label>
                                            {!! Form::text('union_other_4', null, array('placeholder' => 'Union Other 4','class' => 'form-control')) !!}
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
           </div>
       </div>
   </div>
</div>
@endsection