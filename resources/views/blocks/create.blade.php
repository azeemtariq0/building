@extends('layouts.app')


@section('content')
<?php  $isView = (@$block->is_view==1) ? 'readonly' : '';   ?>
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
   <div class="colm-md-12 row" style="margin-top: 10px;">
    <div class="col-md-11"></div>
    <div class="col-md-1  ">
        <a href="{{ url('blocks') }}" class="btn btn-success mt-3">Back</a>
    </div>
</div>

   <div id="content" class="padding-20">

    <div class="row">

        <div class="col-md-12">

            <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>{{ $data['page_management']['title'] ?? "" }}</strong>
                </div>

                <div class="panel-body">
                  @if(!isset($block->id))
                   {!! Form::open(array('route' => 'blocks.store','method'=>'POST', 'id' => 'block_form')) !!}
                   @else
                     {!! Form::model($block, ['method' => 'PATCH','route' => ['blocks.update', $block->id]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-6">


                                 <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Block Code</label>
                                            {!! Form::text('block_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Project *</label>
                                           <select class=" form-control" {{$isView}} id="project_id"  required name="project_id">
                                            <option value=""></option>
                                            @foreach($projects as $value)
                                               <option {{  $value->id== @$block->project_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->project_name}}</option>
                                               @endforeach
                                           </select>
                                    
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10">
                                            <label>Block Name *</label>
                                            {!! Form::text('block_name', null, array('placeholder' => 'Block Name','class' => 'form-control', 'id' => 'block_name',$isView=>true)) !!}
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

                            </div>



                        </fieldset>
                        @if($isView=="")
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                   <i class="fa fa-check"></i> Save
                               </button>
                           </div>                       
                         </div>
                          @endif
                       {!! Form::close() !!}
                   </div>
               </div>
               <!-- /----- -->
           </div>
       </div>
   </div>
</div>
@include('blocks/validate')
@endsection