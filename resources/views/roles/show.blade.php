@extends('layouts.app')


@section('content')
    <div id="content" class="padding-20">

        <div class="row">

            <div class="col-md-12">

                <!-- ------ -->
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-transparent">
                        <strong>Role Info</strong>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $role->name }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission :</strong>
                                    <br>
                                    @if(!empty($rolePermissions))

                                    @foreach($rolePermissions as $v)
                                    <div class="col-sm-4 margin-top-10">
                                        <label class="label label-info" style="font-size: 14px !important;">{{ $v->name }}</label>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /----- -->

            </div>



        </div>

    </div>



@endsection