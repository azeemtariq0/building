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
                        <strong>{{ ($data['page_management'] != "" ? $data['page_management']['page_title'] : "") }}</strong>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(array('route' => 'analyst.store','method'=>'POST', 'files' => true)) !!}
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <input placeholder="Analyst Name" class="form-control" type="text" name="analyst_name">
                                    </div>

                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <button type="submit" name="submit" class="btn btn-3d btn-teal btn-lg btn-block margin-top-5">
                                    Submit
                                </button>
                            </div>
                        </div>

                        </fieldset>
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
            options2.filter(function() {
                return $(this).data('option') === target;
            })
        );
    }
</script>

@endsection