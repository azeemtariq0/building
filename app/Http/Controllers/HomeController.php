<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Expense;
use App\Models\ReceiptType;
use App\Models\ExpenseCategory;
use App\Models\Unit;
use App\Models\block;
use App\Models\Project;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['page_management'] = array(
                'page_title' => 'Dashboard',
                'slug' => ''
            );
        $expense_categories = ExpenseCategory::get();
        $receipt_type = ReceiptType::get();

        $units = Unit::where('soceity_id',auth()->user()->soceity_id);
        if(@auth()->user()->project_id){
            $units  = $units->where('project_id',auth()->user()->project_id);
        }
        if(@auth()->user()->block_id){
            $units  = $units->where('block_id',auth()->user()->block_id);
        }
        $no_of_units = $units->count();



        // Receipt Data
        $receipts = Receipt::where('soceity_id',auth()->user()->soceity_id);
        if(@auth()->user()->project_id){
            $receipts  = $receipts->where('project_id',auth()->user()->project_id);
        }
         if(@auth()->user()->block_id){
            $receipts  = $receipts->where('block_id',auth()->user()->block_id);
        }
        $receipts  = $receipts->select('*')->orderBy('receipt_type_id')->get();
        $receipts  = $this->typeWiseSum($receipts ,'receipt_type_id');


        // Receipt Data
        $expenses = Expense::join('as_expense_detail as exd', 'exd.expense_id', '=', 'as_expenses.id')
        ->where('soceity_id',auth()->user()->soceity_id);
        if(@auth()->user()->project_id){
            $expenses  = $expenses->where('project_id',auth()->user()->project_id);
        }
        if(@auth()->user()->block_id){
            $expenses  = $expenses->where('block_id',auth()->user()->block_id);
        }
        $expenses  = $expenses->select('exd.*','exp_category_id')->orderBy('exp_category_id')->get();
        $expenses  = $this->typeWiseSum($expenses ,'exp_category_id');
        

        // Month Wise Receipt
        $month=[
                1=>'January',
                2=>'Feburary',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'Octubar',
                11=>'November',
                12=>'December',

        ];

        $expenseMonthWise = $this->getonthWiseExpense();
        $expenseMonthWise  = array_column($expenseMonthWise ,'amount','month');          
        $receiptMonthWise = $this->getonthWiseReceipt();
        $receitStatus['approved'] =  array_sum(array_column($receiptMonthWise ,'approved'));
        $receitStatus['pending'] =  array_sum(array_column($receiptMonthWise ,'pending'));
        $receiptMonthWise  = array_column($receiptMonthWise ,'amount','month'); 
        return view('home2', compact('data','receitStatus','receipt_type','expense_categories','receipts','expenses','receiptMonthWise','expenseMonthWise','month','no_of_units'));
    


    }
    public function getonthWiseReceipt(){
                     $receipt =  Receipt::select(
                            DB::raw("sum(amount) as amount"),
                            DB::raw("sum(if(status=1,1,0)) as approved"),
                            DB::raw("sum(if(status=0,1,0)) as pending"),
                            DB::raw("MONTH(receipt_date) as month"),
                            DB::raw("MONTHNAME(receipt_date) as month_name")
                        )
                        ->whereYear('receipt_date', date('Y'))
                        ->where('soceity_id',auth()->user()->soceity_id);

                        if(@auth()->user()->project_id){
                            $receipt  = $receipt->where('project_id',auth()->user()->project_id);
                        }
                        if(@auth()->user()->block_id){
                            $receipt  = $receipt->where('block_id',auth()->user()->block_id);
                        }

                        $receipt = $receipt->groupBy('receipt_date');
                        $receipt = $receipt->get();
                        $receipt = $receipt->toArray();
                         return $receipt;
    }
      public function getonthWiseExpense(){
                      $expense = Expense::select(
                            DB::raw("sum(amount) as amount"),
                            DB::raw("MONTH(exp_date) as month"),
                            DB::raw("MONTHNAME(exp_date) as month_name")
                        )
                        ->leftJoin('as_expense_detail as exd', 'exd.expense_id', '=', 'as_expenses.id')
                        ->where('soceity_id',auth()->user()->soceity_id)
                        ->whereYear('exp_date', date('Y'));

                         if(@auth()->user()->project_id){
                            $expense  = $expense->where('project_id',auth()->user()->project_id);
                        }
                        if(@auth()->user()->block_id){
                            $expense  = $expense->where('block_id',auth()->user()->block_id);
                        }

                        $expense = $expense->groupBy('exp_date');
                        $expense =  $expense->get();
                        $expense =  $expense->toArray();
                        return $expense;
    }

    public function typeWiseSum($result,$type){
        $record = [];
        $amount = 0;
        $exist =[];
        foreach ($result as $value){

           if(!isset($exist[$value->$type])){
               $amount = 0;
           }
           $exist[$value->$type] = $value->$type;
           $amount+= $value->amount;
           $record[$value->$type] = $amount;
       }
         return $record;
    }

      public function allBlocks($id){

        $blocks = block::where('project_id', $id);
        if(auth()->user()->block_id){
             $blocks = $blocks->where('id', auth()->user()->block_id);
        }
        $blocks = $blocks->get();
        return response()->json($blocks);
        
    }

}
