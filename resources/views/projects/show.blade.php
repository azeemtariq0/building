@extends('layouts.app')


@section('content')

    <div id="content" class="padding-20">

        <div class="row">

            <div class="col-md-6">

                <!-- ------ -->
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-transparent">
                        <strong>Permission Info</strong>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $permission->name }}
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