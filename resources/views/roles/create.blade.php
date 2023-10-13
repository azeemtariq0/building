@extends('layouts.app')


@section('content')

    <?php 

/*echo "<pre>";
$nameError = $errors->toArray();
if(!empty($nameError)){
    print_r($nameError['name']); 

}
// print_r($nameError['name']);
echo "</pre>";*/
?>
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
                    <strong>FORM VALIDATION</strong>
                </div>

                <div class="panel-body">

                   {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4 col-sm-4">
                                    <label>Name *</label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label><strong>Permission:</strong></label>
                                    <br>
                                    @foreach($permission as $value)
                                    <div class="col-sm-4">

                                        <label class="checkbox">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}<i></i></label>
                                        </div>
                                        @endforeach
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