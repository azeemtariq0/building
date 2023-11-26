<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\ExpenseDetail;
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
            $data = Expense::with('expense_category','expense_detail')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
               $btn= "<a target='_blank' href='".url('print-expense/'.$row->id)."' class='btn btn-default btn-sm'><i class='fa fa-print'></i></a>";
               $btn.= "<a href='".route('expenses.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";
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
            'block_id' => 'required',
            'exp_category_id' => 'required',
            'project_id' => 'required',
            'exp_date' => 'required',
        ]);

        $expense_id = Expense::insertGetId(
            [
                'project_id' => $request->project_id,
                'block_id' => $request->block_id,
                'exp_category_id' => $request->exp_category_id,
                'payee' => $request->payee,
                'exp_date' => $request->exp_date,
                'year' => date('y'),
                'remarks' => $request->remarks
            ]
        );
        
        foreach ($request->description as $key => $value) {

        ExpenseDetail::create(
            [
                'expense_id' => $expense_id,
                'description' => $value,
                'amount' => $request->amount[$key],
            ]
        );

        }


        return redirect()->route('expenses.index')
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
         $exp_categories  =  ExpenseCategory::get();
        $expense = Expense::with('expense_category','expense_detail')->find($id);
         $data['page_management'] = array(
            'page_title' => 'Edit Expense',
            'slug' => 'Transaction',
            'title' => 'Edit Expense',
        ); 
        return view('expenses.create',compact('expense','exp_categories', 'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'block_id' => 'required',
            'exp_category_id' => 'required',
            'project_id' => 'required',
            'exp_date' => 'required',
        ]);
     


        $expense = Expense::find($id);
        $expense->project_id = $request->project_id;
        $expense->block_id = $request->block_id;
        $expense->exp_category_id = $request->exp_category_id;
        $expense->payee = $request->payee;
        $expense->exp_date = $request->exp_date;
        $expense->remarks = $request->remarks;
        $expense->save();
        
        ExpenseDetail::where('expense_id',$id)->delete();
        foreach ($request->description as $key => $value) {
        ExpenseDetail::create(
            [
                'expense_id' => $id,
                'description' => $value,
                'amount' => $request->amount[$key],
            ]
        );

        }
      

        return redirect()->route('expenses.index')
        ->with('success','Expense updated successfully');
    }

    public function destroy($id){
        DB::table("as_expense_categories")->where('id',$id)->delete();
        return redirect()->route('expense_categories.index')
        ->with('success','Exp Category deleted successfully');
    }
       public function printView($id){


     $data = Expense::with('project', 'block','expense_category','expense_detail')->where('id',$id)->first();
        return view('expenses.print', $data);

    }
}
