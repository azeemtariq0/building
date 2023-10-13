<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\StockCompanies;
use App\Models\Sector;
use App\Models\ResearchReportCategory;
use App\Models\ResearchAnalyst;
use App\Models\ResearchReportType;
use App\Models\ResearchUpload;
use DB, DataTables, Form;

class ResearchController extends Controller
{
   function __construct()
   {
     $this->middleware('permission:research-list|research-create|research-edit|research-delete', ['only' => ['index','store']]);
     $this->middleware('permission:research-create', ['only' => ['create','store']]);
     $this->middleware('permission:research-edit', ['only' => ['edit','update']]);
     $this->middleware('permission:research-delete', ['only' => ['destroy']]);
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {
         $permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('permissions.index',compact('permissions'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }*/
    
    public function index(Request $request)
    {

        if ($request->ajax()) { 
            $data = ResearchUpload::with('rpt_analyst')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('symbol', function($row){
                $text = '<p>'.$row->company->symbol.'</p>';
                return $text;
            })
            ->addColumn('sector', function($row){
                $text = '<p>'.$row->sector->sector_name.'</p>';
                return $text;
            })
            ->addColumn('is_company', function($row){
                $switchClass = "danger";
                $checked = "";
                if($row->is_company == 1){
                    $switchClass = "success";
                    $checked = "checked";
                }
                $text = '<label class="switch switch-'.$switchClass.'">
                <input type="checkbox" '.$checked.'>
                <span class="switch-label" data-on="YES" data-off="NO"></span>
                </label>';
                return $text;
            })
            ->addColumn('is_sector', function($row){
               $switchClass = "danger";
                $checked = "";
                if($row->is_sector == 1){
                    $switchClass = "success";
                    $checked = "checked";
                }
                $text = '<label class="switch switch-'.$switchClass.'">
                <input type="checkbox" '.$checked.' readonly>
                <span class="switch-label" data-on="YES" data-off="NO"></span>
                </label>';
                return $text;
            })
            ->addColumn('category', function($row){
                $text = '<p>'.$row->rpt_category->category_title.'</p>';
                return $text;
            })
            ->addColumn('analyst', function($row){
                $text = '<p>'.$row->rpt_analyst->analyst_name .'</p>';
                return $text;
            })
            ->addColumn('type', function($row){
                $text = '<p>'.$row->rpt_type->report_type_title.'</p>';
                return $text;
            })
            ->addColumn('action', function($row){

               $btn = "<a href='".URL('/uploads/research/').'/'.$row->doc_new_name."' class='btn btn-warning btn-xs white' target='_blank'><i class='fa fa-file-pdf-o'></i>View PDF</a>";


               $btn .= "<a href='".route('research.show',$row->id)."' class='btn btn-info btn-xs white'><i class='fa fa-eye'></i>Show</a>";

               $btn.= "<a href='".route('research.edit',$row->id)."' class='btn btn-success btn-xs white'><i class='fa fa-edit'></i> Edit</a>";

               $btn.= Form::open(['method' => 'DELETE','route' => ['research.destroy', $row->id],'style'=>'display:inline']);
             
               $btn.= Form::button('<i class="fa fa-times"></i>Delete', ['class' => 'btn btn-danger btn-xs white', 'type' => 'submit']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['symbol', 'sector', 'is_company', 'is_sector', 'category', 'analyst', 'type', 'action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Research Management',
            'slug' => ''
        );

        return view('research.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_management'] = array(
            'page_title' => 'Add Research Report',
            'slug' => 'Upload'
        );

        $stockCompanies = StockCompanies::select('id', DB::raw('CONCAT(symbol, " - " ,company_name) AS symbol_company_name'))->orderBy('company_name', 'ASC')->get()->toArray();
        $sectors = Sector::orderBy('sector_name', 'ASC')->get()->toArray();

        $researchReportCategory = ResearchReportCategory::orderBy('id', 'ASC')->get()->toArray();
        $researchAnalyst = ResearchAnalyst::orderBy('analyst_name', 'ASC')->get()->toArray();
        $researchReportType = ResearchReportType::orderBy('id', 'ASC')->get()->toArray();
        return view('research.create', compact('data', 'stockCompanies', 'sectors','researchReportCategory','researchAnalyst','researchReportType'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     request()->validate([
        'title' => 'required',
        'file' => "required|mimes:pdf|max:10000000",
    ]);
     $modifiedFileName = rand().time().'.'.$request->file->extension();
     if($request->file->move(public_path('uploads/research'), $modifiedFileName)){
        ResearchUpload::create([
            'company_id' => $request->input('company'),
            'sector_id' => $request->input('sector'),
            'is_company' => ($request->input('is_company') != "" ? 1 : 0),
            'is_sector' => ($request->input('is_sector') != "" ? 1 : 0),
            'title' => $request->input('title'),
            'rpt_category_id' => $request->input('category'),
            'rpt_analyst_id' => $request->input('analyst'),
            'rpt_type_id' => $request->input('rpt_type'),
            'description' => $request->input('description'),
            'doc_org_name' => $request->file->getClientOriginalName(),
            'doc_new_name' => $modifiedFileName

        ]);
    }
    return redirect()->route('research.index')
    ->with('success','Research uploaded successfully');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_management'] = array(
            'page_title' => 'View Single Research',
            'slug' => 'Show'
        );

        $researchUpload = ResearchUpload::find($id);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        // ->where("role_has_permissions.role_id",$id)
        // ->get();
        
        return view('research.show',compact('researchUpload', 'data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['page_management'] = array(
            'page_title' => 'Edit Research',
            'slug' => 'Edit'
        );
        $research = ResearchUpload::find($id);
        $stockCompanies = StockCompanies::select('id', DB::raw('CONCAT(symbol, " - " ,company_name) AS symbol_company_name'))->orderBy('company_name', 'ASC')->get()->toArray();
        $sectors = Sector::orderBy('sector_name', 'ASC')->get()->toArray();

        $researchReportCategory = ResearchReportCategory::orderBy('category_title', 'ASC')->get()->toArray();
        $researchAnalyst = ResearchAnalyst::orderBy('analyst_name', 'ASC')->get()->toArray();
        $researchReportType = ResearchReportType::orderBy('report_type_title', 'ASC')->get()->toArray();

     return view('research.edit',compact('data', 'stockCompanies', 'sectors','researchReportCategory','researchAnalyst', 'researchReportType','research'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => 'required',
            'file' => "mimes:pdf|max:10000000",
        ]);
        echo "<pre>";
        print_R($request->all());
        echo "</pre>";
        if($request->file){


            $modifiedFileName = rand().time().'.'.$request->file->extension();
            if($request->file->move(public_path('uploads/research'), $modifiedFileName)){
                ResearchUpload::where('id', $id)
                ->update([
                    'company_id' => $request->input('company'),
                    'sector_id' => $request->input('sector'),
                    'is_company' => ($request->input('is_company') != "" ? 1 : 0),
                    'is_sector' => ($request->input('is_sector') != "" ? 1 : 0),
                    'title' => $request->input('title'),
                    'rpt_category_id' => $request->input('category'),
                    'rpt_analyst_id' => $request->input('analyst'),
                    'rpt_type_id' => $request->input('rpt_type'),
                    'description' => $request->input('description'),
                    'doc_org_name' => $request->file->getClientOriginalName(),
                    'doc_new_name' => $modifiedFileName

                ]);
            }
        }else{
            ResearchUpload::where('id', $id)
                ->update([
                    'company_id' => $request->input('company'),
                    'sector_id' => $request->input('sector'),
                    'is_company' => ($request->input('is_company') != "" ? 1 : 0),
                    'is_sector' => ($request->input('is_sector') != "" ? 1 : 0),
                    'title' => $request->input('title'),
                    'rpt_category_id' => $request->input('category'),
                    'rpt_analyst_id' => $request->input('analyst'),
                    'rpt_type_id' => $request->input('rpt_type'),
                    'description' => $request->input('description')
                ]);
        }

        
        return redirect()->route('research.index')
        ->with('success','Research uploaded successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResearchUpload::find($id)->delete();
        // DB::table("research_uploads")->where('id',$id)->delete();
        return redirect()->route('research.index')
        ->with('success','Role deleted successfully');
    }
}
