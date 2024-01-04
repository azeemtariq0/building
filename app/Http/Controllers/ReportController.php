<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Project;
use App\Models\UnitCategory;
use App\Models\ReceiptType;
use App\Models\UnitOwner;
use DB;
use DataTables, Form;       
use PDF; // at the top of the file

class ReportController extends Controller
{
   
    public function index(Request $request){
        $data['page_management'] = array(
            'page_title' => 'Receivable List Report',
            'slug' => 'Report',
            'title' => 'Receivable List Report'
        );
        return view('reports.receivable', compact('data'));
    }
    public function printReportw(Request $request){
        // return view('reports/monthly_print');
        // $filename = 'hello_world.pdf';
        // $data['title'] = 'Hello world!'
        // ;
        // // $view = \View::make('reports/monthly_print', $data);
        // // // return $view->render();
        // // $html = $view->render();

        // $pdf = new PDF;
        // $pdf::SetTitle('Receipt Voucher');
        // $pdf::AddPage();
        // // $pdf::writeHTML($html, true, false, true, false, '');
        // $pdf::Output($filename);

    }
  
public function defaulter(){
     $data['page_management'] = array(
            'page_title' => 'Defaulter List Report',
            'slug' => 'Report',
            'title' => 'Defaulter List Report'
        );
        return view('reports.defaulter', compact('data'));

}
public function printReport(Request $request){

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
        $rows = $units->get();

       $customPaper = array(0,0,567.00,283.80);
        $pdf = new Receivable('landscape', PDF_UNIT,$customPaper, true, 'UTF-8', false);
        // $pdf::setPaper($customPaper, 'landscape');

        //Set Header
        $pdf->data = array(
            'company_name' =>'Apni Soceity Development',
            'report_name' => 'Receivable List Report',
            // 'display_filter' => $display_filter,
        );

        // set document information
        // $pdf::SetCreator(PDF_CREATOR);
        $pdf::SetAuthor('');
        $pdf::SetTitle('Receivable List Report');
        $pdf::SetSubject('Receivable List Report');

        // set margins
        //$pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf::SetMargins(10, 34, 5);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set font
        // $pdf::AddPage();
        $pdf::AddPage('L', 'A4');
        $pdf::setHeaderTemplateAutoreset(true);
        $sr = 0;

        $pdf->Header();
        $pdf::SetFont('freesans', '', 9);
        $k = 0;

        foreach($rows As $k => $row){
            $owner  = UnitOwner::select('owner_name')->where('unit_id',$row->id)->first();
            $resident  = UnitOwner::select('owner_name')->where('unit_id',$row->id)->first();
            $lastReceipt  = Receipt::select('receipt_date','amount')->where('unit_id',$row->id)->orderBy('created_at','DESC')->first();
            $date= @$lastReceipt->receipt_date ? date('d-m-Y',strtotime($lastReceipt->receipt_date)) : '';

            $pdf::Cell( 10, 7, $k+1, 1, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 15, 7, $row->block->block_name, 1, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 30, 7, $row->unit_name, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 50, 7, @$owner->owner_name, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 50, 7, @$resident->resident_name, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 20, 7, 0, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 20, 7, 0, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 20, 7, 0, 1, false, 'L', 0, '', 0, false, 'M', 'M');


            $pdf::Cell( 33, 7, number_format(@$lastReceipt->amount,2), 1, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 25, 7, $date, 1, false, 'C', 0, '', 0, false, 'M', 'M');
          
          
             if( $k==18){
                 $pdf::AddPage('L', 'A4');
                 $pdf->Header(true);
               
                   $k=-1;
             }
               $pdf::Ln(7);
         
            
        } 
         

        // $pdf->Footer();
        $pdf::Output('Receivable List Report:'.date('YmdHis').'.pdf', 'I');
    }
    public function defaulterPrint(Request $request){

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
        $rows = $units->get();

        $customPaper = array(0,0,567.00,283.80);
        $pdf = new Defaulter('landscape', PDF_UNIT,$customPaper, true, 'UTF-8', false);
        // $pdf::setPaper($customPaper, 'landscape');

        //Set Header
        $pdf->data = array(
            'company_name' =>'Apni Soceity Development',
            'report_name' => 'Defaulter List Report',
            // 'display_filter' => $display_filter,
        );

        // set document information
        // $pdf::SetCreator(PDF_CREATOR);
        $pdf::SetAuthor('');
        $pdf::SetTitle('Defaulter List Report');
        $pdf::SetSubject('Defaulter List Report');

        // set margins
        //$pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf::SetMargins(10, 34, 5);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set font
        // $pdf::AddPage();
        $pdf::AddPage('P', 'A4');
        $pdf::setHeaderTemplateAutoreset(true);
        $sr = 0;

        $pdf->Header();
        $pdf::SetFont('freesans', '', 9);
        $k = 0;

        foreach($rows As $k => $row){
            $owner  = UnitOwner::select('owner_name')->where('unit_id',$row->id)->first();
            $resident  = UnitOwner::select('owner_name')->where('unit_id',$row->id)->first();
            $lastReceipt  = Receipt::select('receipt_date','amount')->where('unit_id',$row->id)->orderBy('created_at','DESC')->first();
            $date= @$lastReceipt->receipt_date ? date('d-m-Y',strtotime($lastReceipt->receipt_date)) : '';

            $pdf::Cell( 10, 7, $k+1, 1, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 15, 7, $row->block->block_name, 1, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 30, 7, $row->unit_name, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 43, 7, @$owner->owner_name, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 43, 7, @$resident->resident_name, 1, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 29, 7, number_format(@$lastReceipt->amount,2), 1, false, 'R', 0, '', 0, false, 'M', 'M');
            $pdf::Cell( 25, 7, $date, 1, false, 'C', 0, '', 0, false, 'M', 'M');
          
          
             if( $k==18){
                 $pdf::AddPage('L', 'A4');
                 $pdf->Header(true);
               
                   $k=-1;
             }
               $pdf::Ln(7);
         
            
        } 
         

        // $pdf->Footer();
        $pdf::Output('Defaulter List Report:'.date('YmdHis').'.pdf', 'I');
    }

}


class Receivable extends PDF {
    public $data = array();

    //Page header
    public function Header($type= false) {
      
        
        $this::Ln(-20);
        // Title
        $this::SetFont('freesans', 'B', 14);
        $this::Cell(280, 10,$this->data['company_name'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Ln(7);
        $this::SetFont('freesans', 'B', 12);
        $this::Cell(280, 10, $this->data['report_name'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Ln(7);
        $this::SetFont('freesans', '', 10);
        $this::Cell(280, 10, 'Date From 21-02-2023 To 21-02-2023', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::SetFont('freesans', '', 11);
        $this::Ln(2);
        $this::Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::ln(12);
        $this::SetFont('freesans', 'B', 9);
        $this::Cell( 10, 7, 'Sr.', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 15, 7, 'Block', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 30, 7, 'Unit', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 50, 7, 'Owner Name', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 50, 7, 'Resident Name', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 20, 7, '30 Days', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 20, 7, '60 Days', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 20, 7, '90 Days', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 33, 7, 'Last Paid Amount', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 25, 7, 'Last Paid Date', 1, false, 'C', 0, '', 0, false, 'M', 'M');
         $this::ln(7);

      
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this::SetY(-15);
        // Set font
        $this::SetFont('freesans', 'I', 8);
        // Page number
        $this::Cell(65, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this::Cell(65, 10, 'Page '.$this::getAliasNumPage().'/'.$this::getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this::Cell(65, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
class Defaulter extends PDF {
    public $data = array();

    //Page header
    public function Header($type= false) {
      
        
        $this::Ln(-20);
        // Title
        $this::SetFont('freesans', 'B', 14);
        $this::Cell(190, 10,$this->data['company_name'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Ln(7);
        $this::SetFont('freesans', 'B', 12);
        $this::Cell(190, 10, $this->data['report_name'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Ln(7);
        $this::SetFont('freesans', '', 10);
        $this::Cell(190, 10, 'Date From 21-02-2023 To 21-02-2023', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::SetFont('freesans', '', 11);
        $this::Ln(2);
        $this::Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::ln(12);
        $this::SetFont('freesans', 'B', 9);
        $this::Cell( 10, 7, 'Sr.', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 15, 7, 'Block', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 30, 7, 'Unit', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 43, 7, 'Owner Name', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 43, 7, 'Resident Name', 1, false, 'C', 0, '', 0, false, 'M', 'M');;
        $this::Cell( 29, 7, 'Last Paid Amount', 1, false, 'C', 0, '', 0, false, 'M', 'M');
        $this::Cell( 25, 7, 'Last Paid Date', 1, false, 'C', 0, '', 0, false, 'M', 'M');
         $this::ln(7);

      
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this::SetY(-15);
        // Set font
        $this::SetFont('freesans', 'I', 8);
        // Page number
        $this::Cell(65, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this::Cell(65, 10, 'Page '.$this::getAliasNumPage().'/'.$this::getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this::Cell(65, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}