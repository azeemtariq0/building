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
                    <strong>Receivable Report</strong>
                </div>

                <div class="panel-body">

                   {!! Form::open(array('url' => 'receivable-print','method'=>'GET','target'=>'_blank')) !!}
                    <fieldset>
                        <input type="hidden" name="action" value="contact_send" />

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 mt-4">
                                    <label>From Date*</label>
                                    {!! Form::text('from_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker','required'=>true ,'autocomplete'=>'off')) !!}
                                </div>

                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group mt-4" >
                                <div class="col-md-10 col-sm-10 ">
                                    <label>To Date *</label>
                                   {!! Form::text('to_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker','required'=>true ,'autocomplete'=>'off')) !!}
                                </div>

                            </div>
                        </div>

                        </fieldset>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info margin-top-30 pull-right">
                                   <i class="fa fa-check"></i> Save
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