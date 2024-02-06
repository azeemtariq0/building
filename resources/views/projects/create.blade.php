@extends('layouts.app')


@section('content')
<?php  $isView = (@$project->is_view==1) ? 'readonly' : '';   ?>
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

   <style>


.error {
  color: red;
  margin-left: 5px;
}

label.error {
  display: inline;
}
    </style>


   <div id="content" class="padding-20">

    <div class="row">

        <div class="col-md-12">

            <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>{{ $data['page_management']['title'] ?? "" }}</strong>
                </div>

                <div class="panel-body">
                @if(!isset($project->id))
                   {!! Form::open(array('route' => 'projects.store','method'=>'POST' , 'id' => 'first_form')) !!}
                @else
                   {!! Form::model($project, [ 'id' => 'first_form','method' => 'PATCH','route' => ['projects.update', $project->id]]) !!}
                @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-6">


                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Project Code</label>
                                            {!! Form::text('project_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Project Name <span class="text-danger">*</span></label>
                                            {!! Form::text('project_name', null, array('placeholder' => 'Project Name','class' => 'form-control' , 'id' => 'project_name',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Description </label>
                                             {!! Form::textarea('description', null, array('placeholder' => 'Descreption','class' => 'form-control','rows'=>2,$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>


                                     <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Name <span class="text-danger">*</span></label>
                                            {!! Form::text('union_name', null, array('placeholder' => 'Union Name','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union President </label>
                                            {!! Form::text('union_president', null, array('placeholder' => 'Union President','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>
                                     <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Vice President </label>
                                            {!! Form::text('union_vice_president', null, array('placeholder' => 'Union Vice President','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Secretary </label>
                                            {!! Form::text('union_secretary', null, array('placeholder' => 'Union Secretary','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Joint Secretary </label>
                                            {!! Form::text('union_joint_secretary', null, array('placeholder' => 'Union Joint Secretary','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>



                            </div>


                            <div class="col-md-6">

                           

                            
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Accountant <span class="text-danger">*</span></label>
                                            {!! Form::text('union_accountant', null, array('placeholder' => 'Union Accountant','class' => 'form-control' , 'id' => 'union_accountant',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 1</label>
                                            {!! Form::text('union_other_1', null, array('placeholder' => 'Union Other 1','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 1</label>
                                            {!! Form::text('union_other_2', null, array('placeholder' => 'Union Other 2','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 3</label>
                                            {!! Form::text('union_other_3', null, array('placeholder' => 'Union Other 3','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Union Other 4</label>
                                            {!! Form::text('union_other_4', null, array('placeholder' => 'Union Other 4','class' => 'form-control',$isView=>true)) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </fieldset>
                         @if($isView=="")
                        <div class="row">
                           <div class="col-md-12">
                                <button type="submit" onclick="save()" class="btn btn-info margin-top-30 pull-right">
                                   <i class="fa fa-check"></i>  <?= (!isset($project->id)) ? "Save" : "Update" ?>
                               </button>
                           </div>
                       </div>
                       @endif
                       {!! Form::close() !!}
                   </div>                 
               </div>
               @include('projects/validate')
               <!-- /----- -->
           </div>
       </div>
   </div>
</div>
@endsection