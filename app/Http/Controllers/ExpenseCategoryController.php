<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ExpenseCategory;
use DB;
use DataTables, Form;       

class ExpenseCategoryController extends Controller
{
   function __construct()
   {
    $this->middleware('permission:expense-category-list|expense-category-create|expense-category-delete|expense-category-edit', ['only' => ['index','store']]);
    $this->middleware('permission:expense-category-create', ['only' => ['create','store']]);
    $this->middleware('permission:expense-category-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:expense-category-create', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = ExpenseCategory::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
               $btn ='';
               if (auth()->user()->haspermissionTo('expense-category-view') )
               $btn .= htmlBtn('expense_categories.show',$row->id,'warning','eye');
               if (auth()->user()->haspermissionTo('expense-category-view') )
               $btn.=htmlBtn('expense_categories.edit',$row->id);
               if (auth()->user()->haspermissionTo('expense-category-view') )
               $btn.= htmDeleteBtn('expense_categories.destroy',$row->id);

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Expense Categories',
            'slug' => 'General Setup',
            'title' => 'Manage Expense Categories',
            'add' => 'Add Expense Category',
        );
        return view('expense_categories.index', compact('data'));
    }

    public function create(){
         $data['page_management'] = array(
            'page_title' => 'Add Expense Categories',
            'slug' => 'General Setup',
            'title' => 'Add Expense Categories',
        );        
         return view('expense_categories.create', compact('data'));
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
        $expenseCategory = ExpenseCategory::find($id);
         $data['page_management'] = array(
            'page_title' => 'View Expense Categories',
            'slug' => 'General Setup',
            'title' => 'View Expense Categories',
        ); 
        $expenseCategory['is_view'] =1; 
        return view('expense_categories.create',compact('expenseCategory', 'data'));
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
