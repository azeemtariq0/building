@extends('layouts.app')

@section('content')

@php 
$total_receipt = ($receitStatus['approved']+$receitStatus['pending']) ?? 0;
$pending = ($total_receipt!=0) ? 100*$receitStatus['pending']/$total_receipt   : 0;
$approved = ($total_receipt!=0) ? 100*$receitStatus['approved']/$total_receipt   : 0;

    @endphp

<div id="content" class="dashboard padding-20">

     


              

                     <div id="panel-1" class="panel panel-default" style="display:; ;">
                                <div class="panel-heading">
                                    <span class="title elipsis">
                                        <strong>RECEIPT SUMMARY</strong> <!-- panel title -->
                                        <small class="size-12 weight-300 text-mutted hidden-xs">2024</small>
                                    </span>

                                    <!-- right options -->
                                    <ul class="options pull-right list-inline">
                                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                    <!-- /right options -->

                                </div>

                                <!-- panel content -->
                                <div class="panel-body">

                                     <ul class="easypiecharts list-unstyled">
                                <li class="clearfix">
                                    <span class="stat-number">{{ $total_receipt }}</span>
                                    <span class="stat-title">Total Receipts</span>

                                    <span class="easyPieChart" data-percent="100" data-easing="easeOutBounce" data-barColor="#F8CB00" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
                                        <span class="percent"></span>
                                    </span> 
                                </li>
                                <li class="clearfix">
                                    <span class="stat-number">{{ $receitStatus['pending'] }}</span>
                                    <span class="stat-title">Pending Receipts</span>

                                    <span class="easyPieChart" data-percent="{{ $pending }}" data-easing="easeOutBounce" data-barColor="#F86C6B" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
                                        <span class="percent"></span>
                                    </span> 
                                </li>
                                <li class="clearfix">
                                   <span class="stat-number">{{ $receitStatus['approved'] }}</span>
                                    <span class="stat-title">Approved Receipts</span>

                                    <span class="easyPieChart" data-percent="{{ $approved }}" data-easing="easeOutBounce" data-barColor="#98AD4E" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
                                        <span class="percent"></span>
                                    </span> 
                                </li>
                                <li class="clearfix">
                                    <span class="stat-number">5</span>
                                    <span class="stat-title">Total Units</span>

                                    <span class="easyPieChart" data-percent="100" data-easing="easeOutBounce" data-barColor="#0058AA" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
                                        <span class="percent"></span>
                                    </span> 
                                </li>
                            </ul>

                                </div>
                                <!-- /panel content -->

                                <!-- panel footer -->
                                <div class="panel-footer">

                            <!-- 
                                .md-4 is used for a responsive purpose only on col-md-4 column.
                                remove .md-4 if you use on a larger column
                            -->
                          

                        </div>
                        <!-- /panel footer -->

                    </div>
                    <!-- /PANEL -->


                    

                    <div class="row">
                        <div class="col-md-6">
                            <div id="panel-1" class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="title elipsis">
                                        <strong>Total Receipt Month Wise</strong> <!-- panel title -->
                                        <small class="size-12 weight-300 text-mutted hidden-xs">{{date('Y')}}</small>
                                    </span>
                                    <ul class="options pull-right list-inline">
                                            <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                            <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                     <table class="table table-striped table-bordered table-hover table-responsive data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr.</th>
                                                <th class="text-center">Month Name</th>
                                                <th class="text-center">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=1;$i<=12;$i++){ ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td>{{ @$month[$i] }}</td>
                                                <td class="text-center">{{ @$receiptMonthWise[$i] ?? 0 }}</td>
                                            </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div id="panel-1" class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="title elipsis">
                                        <strong>Total Expense Month Wise</strong> <!-- panel title -->
                                        <small class="size-12 weight-300 text-mutted hidden-xs">2024</small>
                                    </span>
                                    <ul class="options pull-right list-inline">
                                            <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                            <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-responsive data-table">
                                       <thead>
                                            <tr>
                                                <th class="text-center">Sr.</th>
                                                <th class="text-center">Month Name</th>
                                                <th class="text-center">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=1;$i<=12;$i++){ ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td>{{ @$month[$i] }}</td>
                                                <td class="text-center">{{ @$expenseMonthWise[$i] ?? 0 }}</td>
                                            </tr>
                                             <?php } ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12">
                            <div id="panel-1" class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="title elipsis">
                                        <strong>Total Receipt</strong> <!-- panel title -->
                                        <small class="size-12 weight-300 text-mutted hidden-xs">2024</small>
                                    </span>
                                    <ul class="options pull-right list-inline">
                                            <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                            <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                     <table class="table table-striped table-bordered table-hover table-responsive data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr.</th>
                                                <th class="text-center">Receipt Type</th>
                                                <th class="text-center">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($receipt_type as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>{{ "(".$value->receipt_code.") - ".$value->receipt_name }}</td>
                                                <td class="text-center">{{ @$receipts[$value->id] ?? 0 }}</td>
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div id="panel-1" class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="title elipsis">
                                        <strong>Total Expense</strong> <!-- panel title -->
                                        <small class="size-12 weight-300 text-mutted hidden-xs">2024</small>
                                    </span>
                                    <ul class="options pull-right list-inline">
                                            <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                            <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-responsive data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr.</th>
                                                <th class="text-center">Expense Type</th>
                                                <th class="text-center">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach($expense_categories as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>{{ "(".$value->exp_code.") - ".$value->exp_name }}</td>
                                                <td class="text-center">{{ @$expenses[$value->id] ?? 0 }}</td>
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                     
                       

@role('Research')
<div id="content" class="dashboard padding-20">
    <strong>Hi! I am Research User</strong>
</div>
@endrole


@endsection