<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Staff;
use DB;
use DataTables, Form;       

class StaffTypeController extends Controller
{
   function __construct()
   {
     // $this->middleware('projects:role-create', ['only' => ['create','store']]);
     // $this->middleware('projects:role-edit', ['only' => ['edit','update']]);
     // $this->middleware('projects:role-delete', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = StaffType::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
               $btn= "<a href='".route('staff_types.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";
               $btn.= Form::open(['method' => 'DELETE','route' => ['staff_types.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Staff Type',
            'slug' => 'General Setup',
            'title' => 'Manage Staff Types',
            'add' => 'Add Staff Type',
        );
        return view('staff_types.index', compact('data'));
    }

    public function create(){
         $data['page_management'] = array(
            'page_title' => 'Add Staff Types',
            'slug' => 'General Setup',
            'title' => 'Add Staff Type',
        );        
         return view('receipt_types.create', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'receipt_name' => 'required|unique:as_receipt_types,receipt_name',
        ]);

        ReceiptType::create(
            [
                'receipt_code' => $request->input('receipt_code'),
                'receipt_name' => $request->input('receipt_name'),
                'description' => $request->input('description')
            ]
        );

        return redirect()->route('receipt_types.index')
        ->with('success','Receipt Type created successfully');
    }

    public function show($id){
        $permission = ReceiptType::find($id);
        $data['page_management'] = array(
            'page_title' => 'Show expense_categories',
            'slug' => 'Show'
        );

        return view('receipt_types.show',compact('permission', 'data'));
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
        $receiptType->receipt_code = $request->input('receipt_code');
        $receiptType->receipt_name = $request->input('receipt_name');
        $receiptType->description = $request->input('description');
        $receiptType->save();

        return redirect()->route('receipt_types.index')
        ->with('success','Receipt Type updated successfully');
    }

    public function destroy($id){
        DB::table("as_expense_categories")->where('id',$id)->delete();
        return redirect()->route('expense_categories.index')
        ->with('success','Receipt Type deleted successfully');
    }
}
