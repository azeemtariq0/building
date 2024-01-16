<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ReceiptType;
use DB;
use DataTables, Form;       

class ReceiptTypeController extends Controller
{
   function __construct()
   {
    $this->middleware('permission:receipt-list|receipt-create|receipt-edit|receipt-delete', ['only' => ['index','store']]);
    $this->middleware('permission:receipt-create', ['only' => ['create','store']]);
    $this->middleware('permission:receipt-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:receipt-delete', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = ReceiptType::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($model){
            $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
            return $formatDate;
        })
            ->addColumn('action', function($row){
            $btn="";
            if (auth()->user()->haspermissionTo('receipt-type-view') )
               $btn .= htmlBtn('receipt_types.show',$row->id,'warning','eye');
            if (auth()->user()->haspermissionTo('receipt-type-edit') )
               $btn.=htmlBtn('receipt_types.edit',$row->id);
            if (auth()->user()->haspermissionTo('receipt-type-delete') )
               $btn.= htmDeleteBtn('receipt_types.destroy',$row->id);

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Receipt Type',
            'slug' => 'General Setup',
            'title' => 'Manage Receipt Types',
            'add' => 'Add Receipt Type',
        );
        return view('receipt_types.index', compact('data'));
    }

    public function create(){
         $data['page_management'] = array(
            'page_title' => 'Add Receipt Types',
            'slug' => 'General Setup',
            'title' => 'Add Receipt Type',
        );        
         return view('receipt_types.create', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'receipt_name' => 'required|unique:as_receipt_types,receipt_name',
        ]);

        ReceiptType::create(
            [
                'soceity_id' => $request->input('soceity_id'),
                'receipt_code' => $request->input('receipt_code'),
                'receipt_name' => $request->input('receipt_name'),
                'description' => $request->input('description')
            ]
        );

        return redirect()->route('receipt_types.index')
        ->with('success','Receipt Type created successfully');
    }

    public function show($id){
        $receiptType = ReceiptType::find($id);
         $data['page_management'] = array(
            'page_title' => 'View Receipt Type',
            'slug' => 'General Setup',
            'title' => 'View Receipt Type',
        ); 
        $receiptType['is_view'] =1; 
        return view('receipt_types.create',compact('receiptType', 'data'));
    }

    public function edit($id){
        $receiptType = ReceiptType::find($id);
         $data['page_management'] = array(
            'page_title' => 'Edit Receipt Type',
            'slug' => 'General Setup',
            'title' => 'Edit Receipt Type',
        ); 
        return view('receipt_types.create',compact('receiptType', 'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'receipt_name' => 'required',
        ]);

        $receiptType = ReceiptType::find($id);
        $receiptType->soceity_id = $request->input('soceity_id');
        $receiptType->receipt_code = $request->input('receipt_code');
        $receiptType->receipt_name = $request->input('receipt_name');
        $receiptType->description = $request->input('description');
        $receiptType->save();

        return redirect()->route('receipt_types.index')
        ->with('success','Receipt Type updated successfully');
    }

    public function destroy($id){
        DB::table("as_receipt_types")->where('id',$id)->delete();
        return redirect()->route('receipt_types.index')
        ->with('success','Receipt Type deleted successfully');
    }
}
