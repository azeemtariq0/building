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
.main {
    margin-bottom: 10px !important;
}.col-md-3 {
    width: 30%;
}.col-md-3,.col-md-7,.col-md-4,.col-md-5{
  padding-right: 0px !important;
}.center{
  text-align: center;
}.left{
  text-align: left;
}.right{
  text-align: right;
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
                  @if(!isset($expense->id))
                   {!! Form::open(array('route' => 'expenses.store','method'=>'POST' , 'id' => 'expense_form')) !!}
                   @else
                     {!! Form::model($expense, ['method' => 'PATCH','route' => ['expenses.update', $expense->id ]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" name="action" value="contact_send" />
                         <div class="row">

                              <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Exp Code</label>
                                            <div class="col-md-8">
                                           
                                                {!! Form::text('exp_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                         
                                            <label id="unit_category_id-error" class="error" for="unit_category_id"></label>
                                          </div>
                                        

                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                            <label class="col-md-2">Date</label>
                                            <div class="col-md-9">
                                           {!! Form::date('exp_date', null, array('placeholder' => 'AUTO','class' => 'form-control' )) !!}
                                        
                                          </div>

                                    </div>
                                  </div>
                              </div>
                              <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Exp Category</label>
                                            <div class="col-md-8">
                                            <select class=" form-control" required name="exp_category_id">
                                                <option></option>
                                                
                                                @foreach($exp_categories as $value)
                                                <option {{  $value->id== @$expense->exp_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->exp_name}}</option>
                                                @endforeach
                                            </select>
                                            <label id="unit_category_id-error" class="error" for="unit_category_id"></label>
                                          </div>
                                        

                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                            <label class="col-md-2">Payee</label>
                                            <div class="col-md-9">
                                          {!! Form::text('payee', null, array('placeholder' => 'Payee Name..','class' => 'form-control' )) !!}
                                        
                                          </div>

                                    </div>
                                  </div>
                              </div>

                              <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Project Name</label>
                                            <div class="col-md-8">
                                            <select class=" form-control" required name="project_id">
                                                <option></option>
                                                
                                                @foreach($exp_categories as $value)
                                                <option {{  $value->id== @$expense->exp_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->exp_name}}</option>
                                                @endforeach
                                            </select>
                                            <label id="unit_category_id-error" class="error" for="unit_category_id"></label>
                                          </div>
                                        

                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                            <label class="col-md-2">Block</label>
                                            <div class="col-md-9">
                                           <select class="select2 form-control sl"  name="block_id"  id="block_id">
                                                <option value=""></option>
                                                
                                                @foreach($exp_categories as $value)
                                                <option {{  $value->id== @$expense->exp_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->exp_name}}</option>
                                                @endforeach
                                            </select>
                                        <label id="block_id-error" class="error" for="block_id"></label>
                                          </div>

                                    </div>
                                  </div>
                                </div>




                               
                            
                                      <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Description</label>
                                            <div class="col-md-8">
                                            {!! Form::textarea('remarks', null, array('placeholder' => 'Descreption','class' => 'form-control','rows'=>2)) !!}
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
                                    <th width="10%" class="center">S.No </th>
                                    <th  class="center"> Description </th>
                                    <th  class="center" width="20%">Amount</th>
                                    <th  class="center" width="10%"><button type="button" class="btn btn-default btn-xs" id="addNew"><i class="fa fa-plus"></i></button></th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                  <?php if(isset($expense->expense_detail)){ foreach ($expense->expense_detail as $key => $value) {?>
                                    <tr> 
                                        <td class="count center"><?= $key+1 ?></td>
                                        <td>
                                          <textarea rows="1" type="text" class="form-control" name="description[]">{{ $value->description}}</textarea></td>
                                        <td><input type="text" class="form-control right" name="amount[]" value="{{ $value->amount}}"></td>
                                        <td class="center"><button type="button" class="btn btn-default btn-xs removeBtn"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                  <?php }} else{ ?>
                                        <tr> 
                                        <td class="count">1</td>
                                        <td>
                                          <textarea rows="1" type="text" class="form-control" name="description[]" value=""></textarea></td>
                                        <td><input type="text" class="form-control" name="amount[]"></td>
                                        <td><button type="button" class="btn btn-default btn-xs removeBtn"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                   <?php }  ?>
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



