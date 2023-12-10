<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Project;
use App\Models\UnitCategory;
use App\Models\ReceiptType;
use App\Models\UnitOwner;
use DB;
use DataTables, Form; 
use PDF; // at the top of the file
class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

       $data = Receipt::with('project', 'block', 'unit','unit_category','receipt_type');
        $data = $data->get(); 
        return Datatables::of($data)

        ->addIndexColumn()
            ->addColumn('symbol', function($row){
                $text = '<p>dwdwdw</p>';
                return $text;
            })
        ->editColumn('receipt_date', function($model){
            $formatDate = date('d-m-Y',strtotime($model->receipt_date));
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
            // $text = '<label class="switch switch-'.$switchClass.'">
            // <input class="toggle-switch" data-id="'.$row->id.'" type="checkbox" '.$checked.'>
            // <span class="switch-label" data-on="on" data-off="off"></span>
            // </label>';


                   $text = '<input class="toggle-switch right"  data-id="'.$row->id.'" '.($checked ? 'disabled' : '').' type="checkbox" '.$checked.'>';





            
            return $text;
    })
        ->addColumn('action', function($row)
        {
            
                $owner = UnitOwner::where('unit_id',$row->unit_id)->first();

            $btn= '';
            if($row->status == 1){
               $btn.= "<a target='_blank' href='".url('print-receipt/'.$row->id)."' class='btn btn-default btn-sm'><i class='fa fa-print'></i></a>";
           }

               if(auth()->user()->id == $row->created_by && $row->status == 0){
               $btn.= "<button type='button' onclick='ediReceipt(this,".$row->id.")' 
               data-outstanding_amount ='".$row->unit->out_standing_amount."' 
               data-monthly_amount ='".$row->unit_category->monthly_amount."' 
               data-resident ='".(@$row->unit->unit_name.' / '.@$row->project->project_name.' / '.@$owner['current_tenant'])."' 
               data-amount ='".$row->amount."'
               data-receipt_type_id ='".$row->receipt_type_id."'
               data-description ='".$row->description."'
               data-receipt_date ='".date('d-m-Y',strtotime($row->receipt_date))."'
                class='btn btn-info btn-sm'><i class='fa fa-edit'></i></button>";

                

               $btn.= Form::open(['id'=>'delete-form','method' => 'DELETE','route' => ['receipts.destroy', $row->id],'style'=>'display:inline']);
                 $btn.= "<button class='btn btn-danger btn-sm' type='submit' onclick='rowDetele(event)' ><i class='fa fa-trash'></i></button>";
               $btn.= Form::close();

           }



               return $btn;
       })
       
        ->rawColumns(['action','status'])
        ->make(true);
    }

      $data['page_management'] = array(
        'page_title' => 'Receipts',
        'slug' => 'Transaction',
        'title' => 'Manage Receipts',
        'add' => 'Add receipt',
    );

    $receiptType = ReceiptType::get();
    return view('receipt.index', compact('data','receiptType'));

   
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
        $receiptType = ReceiptType::get();
        $data['page_management'] = array(
            'page_title' => 'Create New Receipt',
            'slug' => 'Transaction',
             'title' => 'Manage Receipts',
            'add' => 'Add Receipt',
        );
        return view('receipt.create', compact('data','blocks','projects','unit_categories','receiptType'));
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
        ->addColumn('name', function($model) {
            $owner  = UnitOwner::select('owner_name')->where('unit_id',$model->id)->first();
            return @$owner->owner_name;
        })
        ->addColumn('receipt', function($model) {
            $lastReceipt  = Receipt::select('receipt_date','amount')->where('unit_id',$model->id)->orderBy('created_at','DESC')->first();
            $date= @$lastReceipt->receipt_date ? date('d-m-Y',strtotime($lastReceipt->receipt_date)) : '';
            return ['last_date'=> $date,'last_amount'=>@$lastReceipt->amount];
        })
        ->editColumn('created_at', function($model){
        $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
        return $formatDate;
        })->addColumn('action', function($row){

            $owner = UnitOwner::where('unit_id',$row->id)->first();
            $btn= "<button onclick='generateReceipt(this,".$row->id.")' 
            data-monthly_amount=".$row->unit_category->monthly_amount."  
            data-outstanding_amount=".$row->out_standing_amount."
            data-project_id=".$row->project_id."
            data-resident ='".(@$row->unit_name.' / '.@$row->project->project_name.' / '.@$owner['current_tenant'])."' 
            data-block_id=".$row->block_id."
            data-unit_category_id=".$row->unit_category_id."
            data-outstanding_amount=".$row->out_standing_amount."
            class='btn btn-info btn-sm'> <i class='fa fa-edit'> <span>Create</span></button>";
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
                        'receipt_type_id' => $request->input('receipt_type_id'),
                        'unit_category_id' => $request->input('unit_category_id'),
                        'amount' => $request->input('amount'),
                        'description' => $request->input('description'),
                        'year' => date('y'),
                        'receipt_date' => date('Y-m-d'),
                        'status' => 0,
                        'created_by' => auth()->user()->id,
                    ]
            );
        }else{
            $_return = ['msg'=>'Receipt Updated Successfully!'];
            $staffType = receipt::find($request->id);
            $staffType->receipt_type_id = $request->input('receipt_type_id');
            $staffType->amount = $request->input('amount');
            $staffType->updated_by = auth()->user()->id;
            $staffType->save();
        }
        echo json_encode($_return);
        exit;
    }
    public function updateStatus(Request $request){
        $_return = ['success'=>true,'msg'=>'Status Updated Successfully!'];
        $receipt = receipt::where('id',$request->id)->first();

        // Unit Outsatding Amount update
        $unit = Unit::where('id',$receipt->unit_id)->first();
        $unit->out_standing_amount =  $unit->out_standing_amount  - $receipt->amount;
        $unit->update();

         // Receipt Status update
        $receipt->status =  $request->status;
        $receipt->update();


        echo json_encode($_return);
        exit;
    }
    public function printView($id){


     $data = Receipt::with('project', 'block', 'unit','unit_category','receipt_type')->where('id',$id)->first();
     $data['owner']  = UnitOwner::select('*')->where('unit_id',$data->unit->id)->first();
// dd($data);
   return view('receipt.receipt', $data);
        $filename = 'hello_world.pdf';
        $data['title'] = 'Hello world!'
        ;
        $view = \View::make('receipt.pdf2', $data);
        // return $view->render();
        $html = $view->render();

        $pdf = new PDF;
        $pdf::SetTitle('Receipt Voucher');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output($filename);

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
