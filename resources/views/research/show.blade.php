@extends('layouts.app')


@section('content')


<div id="content" class="padding-20">

    <div class="row">

        <div class="col-md-12">

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-transparent">
                            <strong>View PDF</strong>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                     <object data=
                                     "{{URL('/uploads/research/').'/'.$researchUpload->doc_new_name}}" class="full-width"> 
                                 </object>
                                 <!-- <iframe src="filename.pdf"></iframe> -->


                                 <?php 
/*                                      $file = 'filename.pdf';
$filename = 'filename.pdf';
  
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
// Read the file
echo @readfile($file);*/
?>

</div>
</div>
</div>


</div>

</div>
</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading panel-heading-transparent">
            <strong>Research Detail</strong>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="alert  alert-default margin-bottom-10"><!-- DEFAULT -->
                        <strong>Company: </strong> {{$researchUpload->company->symbol .' - '.$researchUpload->company->company_name}}
                    </div>

                    <div class="alert  alert-default margin-bottom-10"><!-- DEFAULT -->
                        <strong>Sector: </strong> {{$researchUpload->sector->sector_name}}
                    </div>

                    <div class="alert  alert-default margin-bottom-10"><!-- DEFAULT -->
                        <div class="row">
                            <div class="col-sm-6"><strong>Is Company</strong>

                                <?php 
                                $switchClass = "danger";
                                $checked = "";
                                if($researchUpload->is_company == 1){
                                    $switchClass = "success";
                                    $checked = "checked";
                                }
                                echo '<br><label class="margin-top-10 switch switch-'.$switchClass.'">
                                <input type="checkbox" '.$checked.'>
                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                </label>';
                                ?>
                            </div>
                            <div class="col-sm-6"><strong>Is Sector</strong>
                                <?php 
                                $switchClass = "danger";
                                $checked = "";
                                if($researchUpload->is_sector == 1){
                                    $switchClass = "success";
                                    $checked = "checked";
                                }
                                echo '<br><label class="margin-top-10 switch switch-'.$switchClass.'">
                                <input type="checkbox" '.$checked.' readonly>
                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                </label>';
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="alert  alert-default margin-bottom-10"><!-- DEFAULT -->
                        <strong>Title: </strong> {{$researchUpload->title}}
                    </div>


                    <div class="alert  alert-default margin-bottom-10"><!-- DEFAULT -->
                        <div class="row">
                            <div class="col-sm-4"><strong>Category</strong> <br>{{$researchUpload->rpt_category->category_title}}</div>
                            <div class="col-sm-4"><strong>Analyst</strong> <br>{{$researchUpload->rpt_analyst->analyst_name}}</div>
                            <div class="col-sm-4"><strong>Type</strong> <br>{{$researchUpload->rpt_type->report_type_title}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-bordered-dotted margin-bottom-30"><!-- DOTTED --></span>
                            <h4><strong>Description</strong></h4>
                            <?php echo $researchUpload->description;  ?>
                        </div>

                    </div>

                </div>
            </div>


        </div>

    </div>
</div>
</div>

<!-- ------ -->

<!-- /----- -->

</div>



</div>

</div>

@endsection

@section('pagelevelstyle')
<style type="text/css">
    .full-width{
        width: 100%;
        min-height: 1150px;
    }
</style>
@endsection