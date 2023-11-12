<?php

namespace App\Http\Controllers;

use App\Models\receipt;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Project;
use App\Models\UnitCategory;
use DB;
use DataTables, Form; 
class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { if ($request->ajax()) {

       $data = Receipt::with('project', 'block', 'unit','unit_category');
        $data = $data->get(); 
        return Datatables::of($data)

        ->addIndexColumn()
            ->addColumn('symbol', function($row){
                $text = '<p>dwdwdw</p>';
                return $text;
            })
        ->editColumn('created_at', function($model){
        $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
        return $formatDate;
    })->addColumn('status', function($row){
            $switchClass = "";
            $checked = "";
            if ($row->status == 1) {
                $switchClass = "success";
                $checked = "checked";
            } else if ($row->status == 0) {
                $switchClass = "";
            }
            $text = '<label class="switch switch-'.$switchClass.'">
            <input class="toggle-switch" data-id="'.$row->id.'" type="checkbox" '.$checked.'>
            <span class="switch-label" data-on="on" data-off="off"></span>
            </label>';
            
            return $text;
    })
        ->addColumn('action', function($row)
        {
            
               $btn= "<button type='button' onclick='ediReceipt(this,".$row->id.")' data-outstanding_amount ='".$row->unit->out_standing_amount."' data-monthly_amount ='".$row->unit_category->monthly_amount."' data-amount ='".$row->amount."' class='btn btn-info btn-sm'><i class='fa fa-edit'></i> <span>Edit</span></button>";
               $btn.= Form::open(['id'=>'delete-form','method' => 'DELETE','route' => ['receipts.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm dltBtn','onclick'=>'rowDetele(event)']);
               $btn.= Form::close();

               return $btn;
       })
       
        ->rawColumns(['action','status'])
        ->make(true);
    }

      $data['page_management'] = array(
        'page_title' => 'Receipts',
        'slug' => 'General Setup',
        'title' => 'Manage Blocks',
        'add' => 'Add receipt',
    );


    return view('receipt.index', compact('data'));

   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks  =  Block::get();
        $unit_categories  =  UnitCategory::get();
        $projects  =  Project::get();
        $data['page_management'] = array(
            'page_title' => 'Create New Receipt',
            'slug' => 'Transaction',
             'title' => 'Manage Receipts',
            'add' => 'Add Receipt',
        );
        return view('receipt.create', compact('data','blocks','projects','unit_categories'));
    }

    public function getUnits(Request $request){

        if ($request->ajax()) {
        $units = Unit::with('project','block','unit_category');
         if(!empty($request->project_id)){
                $units->where('project_id',$request->project_id);
        }
        if(!empty($request->block_id)){
                $units->where('block_id',$request->block_id);
        }
        if(!empty($request->unit_category_id)){ 
                $units->where('unit_category_id',$request->unit_category_id);
        }
        $units = $units->get();
        return Datatables::of($units)
        ->addIndexColumn()
        ->addColumn('receipt', function($model) {
            $lastReceipt  = receipt::select('receipt_date','amount')->where('unit_id',$model->id)->orderBy('created_at','DESC')->first();
            return ['last_date'=> @$lastReceipt->receipt_date,'last_amount'=>@$lastReceipt->amount];
        })
        ->editColumn('created_at', function($model){
        $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
        return $formatDate;
        })->addColumn('action', function($row){
            $btn= "<button onclick='generateReceipt(this,".$row->id.")' 
            data-monthly_amount=".$row->unit_category->monthly_amount."  
            data-outstanding_amount=".$row->out_standing_amount."
            data-project_id=".$row->project_id."
            data-block_id=".$row->block_id."
            data-unit_category_id=".$row->unit_category_id."
            data-outstanding_amount=".$row->out_standing_amount."

            class='btn btn-info btn-sm'> <i class='fa fa-edit'> <span>Generate</span></button>";
               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

      $data['page_management'] = array(
        'page_title' => 'Block',
        'slug' => 'General Setup',
        'title' => 'Manage Blocks',
        'add' => 'Add Block',
    );

    return view('receipt.create', compact('data'));
    }

    public function addReceipt(Request $request){
        $_return = ['success'=>true,'msg'=>'Receipt Created Successfully!'];
        if(empty($request->id)){
            receipt::create(
                    [
                        'unit_id' => $request->input('unit_id'),
                        'project_id' => $request->input('project_id'),
                        'block_id' => $request->input('block_id'),
                        'unit_category_id' => $request->input('unit_category_id'),
                        'amount' => $request->input('amount'),
                        'year' => date('y'),
                        'receipt_date' => date('Y-m-d'),
                        'status' => 0,
                        'created_by' => 1, //Auth::id(),
                    ]
            );
        }else{
            $_return = ['msg'=>'Receipt Updated Successfully!'];
            $staffType = receipt::find($request->id);
            $staffType->amount = $request->input('amount');
            $staffType->save();
        }
        echo json_encode($_return);
        exit;
    }
    public function updateStatus(Request $request){
        $_return = ['success'=>true,'msg'=>'Status Updated Successfully!'];
        $receipt = receipt::where('id',$request->id)->first();
        $receipt->status =  $request->status;
        $receipt->update();
        echo json_encode($_return);
        exit;
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::table("as_receipts")->where('id',$id)->delete();
        return redirect()->route('receipts.index')
        ->with('success','Receipt deleted successfully');
    }
}
