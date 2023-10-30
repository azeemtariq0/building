<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Project;
use App\Models\UnitCategory;
use DB;
use DataTables, Form;       

class UnitController extends Controller
{
   function __construct()
   {
    $this->middleware('permission:unit-list|unit-create|unit-edit|unit-delete', ['only' => ['index','store']]);
    $this->middleware('permission:unit-create', ['only' => ['create','store']]);
    $this->middleware('permission:unit-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:unit-delete', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = Unit::with('project','block','unit_category')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($model){
            $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
            return $formatDate;
        })
            ->addColumn('action', function($row){
               $btn= "<a href='".route('units.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";
               $btn.= Form::open(['method' => 'DELETE','route' => ['units.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }



        $data['page_management'] = array(
            'page_title' => 'Unit',
            'slug' => 'General Setup',
            'title' => 'Manage Units',
            'add' => 'Add Unit',
        );
     

        return view('units.index', compact('data'));
    }

    public function create(){
        $blocks  =  Block::get();
        $unit_categories  =  UnitCategory::get();
        $projects  =  Project::get();

         $data['page_management'] = array(
            'page_title' => 'Add Unit',
            'slug' => 'General Setup',
            'title' => 'Add Unit',
        );        
         return view('units.create', compact('data','blocks','projects','unit_categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'unit_name' => 'required|unique:as_units,unit_name',
        ]);

    
        Unit::create(
            [
                'unit_code' => $request->input('unit_code'),
                'unit_name' => $request->input('unit_name'),
                'project_id' => $request->input('project_id'),
                'block_id' => $request->input('block_id'),
                'unit_category_id' => $request->input('unit_category_id'),
                'unit_size' => $request->input('unit_size'),
                'out_standing_amount' => $request->input('out_standing_amount'),
                'ob_date' => $request->input('ob_date')
            ]
        );

        return redirect()->route('units.index')
        ->with('success','Unit created successfully');
    }

    public function show($id){
        $permission = UnitCategory::find($id);
        $data['page_management'] = array(
            'page_title' => 'Show expense_categories',
            'slug' => 'Show'
        );

        return view('units.show',compact('permission', 'data'));
    }

    public function edit($id){
        $unit = Unit::find($id);
        $blocks  =  Block::get();
        $unit_categories  =  UnitCategory::get();
        $projects  =  Project::get();

         $data['page_management'] = array(
            'page_title' => 'Edit Unit',
            'slug' => 'General Setup',
            'title' => 'Edit Unit',
        ); 
        return view('units.create',compact('unit', 'data','blocks','projects','unit_categories'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'unit_name' => 'required',
        ]);

        $unitCategory = Unit::find($id);
        $unitCategory->unit_code = $request->input('unit_code');
        $unitCategory->unit_name = $request->input('unit_name');
        $unitCategory->project_id = $request->input('project_id');
        $unitCategory->block_id = $request->input('block_id');
        $unitCategory->unit_category_id = $request->input('unit_category_id');
        $unitCategory->unit_size = $request->input('unit_size');
        $unitCategory->out_standing_amount = $request->input('out_standing_amount');
        $unitCategory->ob_date = $request->input('ob_date');

        $unitCategory->save();
        return redirect()->route('units.index')
        ->with('success','Unit updated successfully');
    }

    public function destroy($id){
        DB::table("as_units")->where('id',$id)->delete();
        return redirect()->route('units.index')
        ->with('success','Unit deleted successfully');
    }
}
