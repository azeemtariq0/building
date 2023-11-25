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
<style type="">
  form .row {
    margin-bottom: 10px;
}.col-md-3 {
    width: 30%;
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
                  @if(!isset($expenseCategory->id))
                   {!! Form::open(array('route' => 'expense_categories.store','method'=>'POST' , 'id' => 'expense_form')) !!}
                   @else
                     {!! Form::model($expenseCategory, ['method' => 'PATCH','route' => ['expense_categories.update', $expenseCategory->id ]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="col-md-10">


                                 <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Expense no</label>
                                            <div class="col-md-8">
                                            {!! Form::text('exp_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                          </div>
                                        

                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                            <label class="col-md-2">Date</label>
                                            <div class="col-md-9">
                                            {!! Form::text('exp_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                          </div>
                                        

                                    </div>
                                  </div>
                                </div>
                                      <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Exp Category</label>
                                            <div class="col-md-8">
                                            <select class="select2 form-control" required name="unit_category_id">
                                                <option></option>
                                                
                                                @foreach($exp_categories as $value)
                                                <option {{  $value->id== @$expense->exp_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->exp_name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        

                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                            <label class="col-md-2">Block</label>
                                            <div class="col-md-9">
                                           <select class="select2 form-control" required name="unit_category_id">
                                                <option></option>
                                                
                                                @foreach($exp_categories as $value)
                                                <option {{  $value->id== @$expense->exp_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->exp_name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        

                                    </div>
                                  </div>
                                </div>


                               
                            
                                      <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Description</label>
                                            <div class="col-md-8">
                                            {!! Form::textarea('description', null, array('placeholder' => 'Descreption','class' => 'form-control','rows'=>1)) !!}
                                          </div>
                                        

                                    </div>
                                  </div>
                                  </div>
                              

                            </div>



                        </fieldset>


                             <div class="table-responsive" style="margin-top: 20px">
                            <table class="table table-striped table-bordered table-hover table-responsive data-table mt-4" width="100%">
                                <thead>
                                  <tr>
                                    <th class="center">S.No </th>
                                    <th>Expense Description </th>
                                    <th>Amount</th>
                                    <th width="10%"><button type="button" class="btn btn-default btn-xs" id="addNew"><i class="fa fa-plus"></i></button></th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                  <tr> 
                                      <td class="count">1</td>
                                      <td><textarea rows="1" type="text" class="form-control" name="description"></textarea></td>
                                      <td><input type="text" class="form-control" name="description"></td>
                                      <td><button type="button" class="btn btn-default btn-xs removeBtn"><i class="fa fa-trash"></i></button></td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>

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
   <script type="">
     $(document).ready(function() {
     $('#addNew').on('click',function(){
      $tr = $('#tbody').find('tr:last');
      var $clone = $tr.clone();
     $tr.after($clone);
  
    SequenceNo();
    removeDiv();
    singleDiv();

});
});

function SequenceNo(){
$.each($('.count'),function(i,elem){
$(this).text(i+1);
});
}

function singleDiv(){
    if($('.removeBtn').length==1)
        $('.removeBtn').attr('style','display:none');
    else
        $('.removeBtn').removeAttr('style');
}
singleDiv();

function removeDiv(){
$('.removeBtn').on('click',function(){
   $(this).closest('tr').remove();
   singleDiv();
   SequenceNo();
});
}
removeDiv();

   </script>
</div>
@include('expense_categories/validate')
@endsection



