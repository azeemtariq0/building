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

        <div class="col-md-8">

            <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>Add Research Report</strong>
                </div>

                <div class="panel-body">

                    {!! Form::open(array('route' => 'research.store','method'=>'POST', 'files' => true)) !!}
                    <fieldset>
                        <!-- <input type="hidden" name="action" value="contact_send" /> -->


                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                 <select class="form-control select2" name="company">
                                    <option value="">Choose a Company</option>
                                    @foreach ($stockCompanies as $stockCompany)
                                    <option value="{{$stockCompany['id']}}">{{ $stockCompany['symbol_company_name']}}</option>
                                    @endforeach
                                </select>

                                <i class="fancy-arrow-double"></i>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control select2" name="sector">
                                    <option value="">Choose a Sector</option>
                                    @foreach ($sectors as $sector)
                                    <option value="{{$sector['id']}}">{{ $sector['sector_name'] }}</option>
                                    @endforeach

                                </select>

                                <i class="fancy-arrow-double"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6">
                             <label class="switch switch-success">
                                <input type="checkbox" id="is_company" name="is_company">
                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                <small class="text-muted block">If company select this</small>
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="switch switch-success">
                                <input type="checkbox" id="is_sector" name="is_sector">
                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                <small class="text-muted block">If sector select this</small>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <input placeholder="Title" class="form-control" type="text" name="title">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group">

                        <div class="col-md-4 col-sm-4">
                            <select class="form-control select2" name="category" id="category" onchange="giveSelection()">
                                <option value="">Choose Category</option>
                                @foreach ($researchReportCategory as $category)
                                <option data-option="{{$category['id']}}" value="{{$category['id']}}">{{ $category['category_title'] }}</option>
                                @endforeach
                            </select>
                            <i class="fancy-arrow-double"></i>
                        </div>
                        
                        <div class="col-md-4 col-sm-4">
                            <select class="form-control select2" name="rpt_type" id="rpt_type">
                                <option value="">Choose Report Type</option>
                                @foreach ($researchReportType as $type)
                                <option data-option="{{$type['main_cat_id']}}" value="{{$type['id']}}">{{ $type['report_type_title'] }}</option>
                                @endforeach                               
                            </select>
                            <i class="fancy-arrow-double"></i>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <select class="form-control select2" name="analyst">
                                <option value="">Choose Analyst</option>
                                @foreach ($researchAnalyst as $analyst)
                                <option value="{{$analyst['id']}}">{{ $analyst['analyst_name'] }}</option>
                                @endforeach                           
                            </select>
                            <i class="fancy-arrow-double"></i>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <textarea class="summernote form-control" data-height="150" data-lang="en-US" name="description"></textarea>
                        </div>

                    </div>
                </div>

                <!-- fancy success -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <div class="fancy-file-upload fancy-file-success">
                                <i class="fa fa-upload"></i>
                                <input type="file" class="form-control" onchange="jQuery(this).next('input').val(this.value);"  accept="application/pdf" name="file"/>
                                <input type="text" class="form-control" placeholder="no file selected" readonly="" />
                                <span class="button">Choose File</span>
                            </div>
                        </div>
                    </div>
                </div>



             <!--    <div class="row">
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <div class="dropzone nomargin" id="my-dropzone" name="file"></form>
                            </div>

                        </div>
                    </div> -->



                </fieldset>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <button type="submit" name="submit" class="btn btn-3d btn-teal btn-lg btn-block margin-top-5">
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


@section('pagelevelstyle')
@endsection

@section('pagelevelscript')
<script type="text/javascript">
var sel1 = $('#category');
    var sel2 = $('#rpt_type');
    var options2 = sel2.find('option');

    function giveSelection() {
        sel2.empty();
      var target = sel1.find(':selected').data('option');

      sel2.empty().append(
        options2.filter(function(){
          return $(this).data('option') === target;
      })
        );
  }
</script>

@endsection