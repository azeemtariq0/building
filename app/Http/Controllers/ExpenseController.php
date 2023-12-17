<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\ExpenseCategory;
use App\Models\Project;
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
            ->editColumn('exp_date', function($model){
               $formatDate = date('d-m-Y',strtotime($model->exp_date));
               return $formatDate;
            })
            ->addColumn('action', function($row){
               $btn= "<a target='_blank' title='Expense Voucher Print' href='".url('print-expense/'.$row->id)."' class='btn btn-default btn-sm'><i class='fa fa-print'></i></a>";

               if (auth()->user()->haspermissionTo('expense-view') )
                  $btn.= htmlBtn('expenses.show',$row->id,'warning','eye');

               if($row->status==0){
                       if (auth()->user()->haspermissionTo('expense-freez') )
                        $btn.= "<a title='Freez Voucher' href='javascript:void(0)' onclick='freezVoucher(".$row->id.")' class='btn btn-success btn-sm'><i class='fa fa-thumbs-up'></i></a>";
                    if (auth()->user()->haspermissionTo('expense-edit') )
                        $btn.=htmlBtn('expenses.edit',$row->id);
                    if (auth()->user()->haspermissionTo('expense-delete') )
                        $btn.= htmDeleteBtn('expenses.destroy',$row->id);
               }
             
             


               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Expenses Voucher',
            'slug' => 'Transaction',
            'title' => 'Manage Expenses Voucher',
            'add' => 'Add Expense Voucher',
        );
        return view('expenses.index', compact('data'));
    }

    public function create(){
         $exp_categories  =  ExpenseCategory::get();
         $projects  =  Project::get();

         $data['page_management'] = array(
            'page_title' => 'Add Expense Voucher',
            'slug' => 'Transaction',
            'title' => 'Add Expense Voucher',
        );        
         return view('expenses.create', compact('data','projects' ,'exp_categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            // 'block_id' => 'required',
            'exp_category_id' => 'required',
            // 'project_id' => 'required',
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
                'remarks' => $request->remarks,
                'created_by' =>  auth()->user()->id
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
        $exp_categories  =  ExpenseCategory::get();
        $projects  =  Project::get();

        $expense = Expense::with('expense_category','expense_detail')->find($id);
        $data['page_management'] = array(
            'page_title' => 'View Expense Voucher',
            'slug' => 'Transaction',
            'title' => 'View Expense Voucher',
        ); 
        $expense['is_view'] =1; 
        return view('expenses.create',compact('expense','exp_categories','projects' ,'data'));
    }

    public function edit($id){
         $exp_categories  =  ExpenseCategory::get();
         $projects  =  Project::get();

        $expense = Expense::with('expense_category','expense_detail')->find($id);
         $data['page_management'] = array(
            'page_title' => 'Edit Expense Voucher',
            'slug' => 'Transaction',
            'title' => 'Edit Expense Voucher',
        ); 
         $expense['view'] =0; 

        return view('expenses.create',compact('expense','exp_categories','projects' ,'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            // 'block_id' => 'required',
            'exp_category_id' => 'required',
            // 'project_id' => 'required',
            'exp_date' => 'required',
        ]);
     


        $expense = Expense::find($id);
        $expense->project_id = $request->project_id;
        $expense->block_id = $request->block_id;
        $expense->exp_category_id = $request->exp_category_id;
        $expense->payee = $request->payee;
        $expense->exp_date = $request->exp_date;
        $expense->remarks = $request->remarks;
        $expense->updated_by =  auth()->user()->id;
        $expense->save();
        
        ExpenseDetail::where('expense_id',$id)->delete();
        foreach ($request->description as $key => $value) {
        ExpenseDetail::create(
            [
                'expense_id' => $id,
                'description' => $value,
                'reference_no' => $request->reference_no[$key],
                'reference_date' => $request->reference_date[$key],
                'amount' => $request->amount[$key],
            ]
        );

        }
      

        return redirect()->route('expenses.index')
        ->with('success','Expense updated successfully');
    }

    public function destroy($id){
        DB::table("as_expenses")->where('id',$id)->delete();
        DB::table("as_expense_detail")->where('expense_id',$id)->delete();
        return redirect()->route('expenses.index')
        ->with('success','Expense deleted successfully');
    }


    public function feezExpenseVoucher($id){
        $expense = Expense::where('id', $id)->first();
        $expense->updated_by =  auth()->user()->id;
        $expense->updated_at =  date('Y-m-d H:i:s');
        $expense->status =  1;
        $expense->update();
        return response()->json(['msg'=>'Expense Voucher Freez successfully!']);
        
    }

    public function printView($id){
     $data = Expense::with('project', 'block','expense_category','expense_detail')->where('id',$id)->first();
        return view('expenses.print', $data);

    }
}
