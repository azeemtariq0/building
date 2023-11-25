<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use DB;
use DataTables, Form;       

class ExpenseController extends Controller
{
   function __construct()
   {
    // $this->middleware('permission:expense-category-list|expense-category-create|expense-category-delete|expense-category-edit', ['only' => ['index','store']]);
    // $this->middleware('permission:expense-category-create', ['only' => ['create','store']]);
    // $this->middleware('permission:expense-category-edit', ['only' => ['edit','update']]);
    // $this->middleware('permission:expense-category-create', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = Expense::with('expense_category')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
               $btn= "<a href='".route('expenses.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";
               $btn.= Form::open(['method' => 'DELETE','route' => ['expenses.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Expenses',
            'slug' => 'Transaction',
            'title' => 'Manage Expenses',
            'add' => 'Add Expense',
        );
        return view('expenses.index', compact('data'));
    }

    public function create(){
         $exp_categories  =  ExpenseCategory::get();
         $data['page_management'] = array(
            'page_title' => 'Add Expense',
            'slug' => 'Transaction',
            'title' => 'Add Expense',
        );        
         return view('expenses.create', compact('data','exp_categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'exp_name' => 'required|unique:as_expense_categories,exp_name',
        ]);

        ExpenseCategory::create(
            [
                'exp_code' => $request->input('exp_code'),
                'exp_name' => $request->input('exp_name'),
                'description' => $request->input('description')
            ]
        );

        return redirect()->route('expense_categories.index')
        ->with('success','Exp Category created successfully');
    }

    public function show($id){
        $permission = ExpenseCategory::find($id);
        $data['page_management'] = array(
            'page_title' => 'Show expense_categories',
            'slug' => 'Show'
        );

        return view('expense_categories.show',compact('permission', 'data'));
    }

    public function edit($id){
        $expenseCategory = ExpenseCategory::find($id);
         $data['page_management'] = array(
            'page_title' => 'Edit Expense Categories',
            'slug' => 'General Setup',
            'title' => 'Edit Expense Categories',
        ); 
        return view('expense_categories.create',compact('expenseCategory', 'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'exp_name' => 'required',
        ]);

        $expCat = ExpenseCategory::find($id);
        $expCat->exp_code = $request->input('exp_code');
        $expCat->exp_name = $request->input('exp_name');
        $expCat->description = $request->input('description');
        $expCat->save();

        return redirect()->route('expense_categories.index')
        ->with('success','Exp Category updated successfully');
    }

    public function destroy($id){
        DB::table("as_expense_categories")->where('id',$id)->delete();
        return redirect()->route('expense_categories.index')
        ->with('success','Exp Category deleted successfully');
    }
}