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
use App\Models\UnitOwner;
use App\Models\UnitResident;
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
               $btn = htmlBtn('units.show',$row->id,'warning','eye');
               $btn.=htmlBtn('units.edit',$row->id);
               $btn.= htmDeleteBtn('units.destroy',$row->id);

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
        $units = Unit::get();

         $data['page_management'] = array(
            'page_title' => 'Add Unit',
            'slug' => 'General Setup',
            'title' => 'Add Unit',
        );        
         return view('units.create', compact('data','blocks','projects','unit_categories','units'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'unit_name' => 'required|unique:as_units,unit_name',
        ]);


        $unit =  Unit::create(
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

        $unitOwner = UnitOwner::create(
            [
                'unit_id' => $unit->id
            ]
        );

        $unitResidence = UnitResident::create(
            [
                'unit_id' => $unit->id
            ]
        );


        return redirect()->route('units.index')
            ->with('success', 'Unit created successfully');
    }

    public function edit($id) {
        $unit = Unit::find($id);
        $blocks  =  Block::get();
        $unit_categories  =  UnitCategory::get();
        $projects  =  Project::get();

        $unit_owner = UnitOwner::where('unit_id', $id)->get()->first();
        $unit_resident = UnitResident::where('unit_id', $id)->get()->first();


        $units = Unit::get();

        $data['page_management'] = array(
            'page_title' => 'Edit Unit Owner',
            'slug' => 'General Setup',
            'title' => 'Edit Unit Owner',
        );

        //  $data['page_management'] = array(
        //     'page_title' => 'Edit Unit',
        //     'slug' => 'General Setup',
        //     'title' => 'Edit Unit',
        // ); 
        return view('units.create', compact('unit', 'data', 'blocks', 'projects', 'unit_categories', 'units', 'unit_owner','unit_resident'));
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

    public function unitOwnerUpate(Request $request){


        $this->validate($request, [
            'owner_name' => 'required',
        ]);
        

        $unitOwner = UnitOwner::where('unit_id',$request->unit_id)->get()->first();
        $unitOwner->owner_name = $request->input('owner_name');
        $unitOwner->owner_cnic = $request->input('owner_cnic');
        $unitOwner->owner_email = $request->input('owner_email');
        $unitOwner->identity_type = $request->input('identity_type');
        $unitOwner->mobile_no = $request->input('mobile_no');
        $unitOwner->ptcl_no = $request->input('ptcl_no');
        $unitOwner->owner_since = date('Y-m-d',strtotime($request->input('owner_since')));
        $unitOwner->current_tenant = $request->input('current_tenant');
        $unitOwner->owner_address = $request->input('owner_address');


         $unitOwner =  $unitOwner->save();
         echo json_encode($unitOwner);
        // return redirect()->route('unit_owners.index')
        // ->with('success','Unit Owner updated successfully');
    }

    public function residenyUpdate(Request $request)

    {

        $resident = UnitResident::where('unit_id',$request->unit_id)->get()->first();
        $resident->resident_name = $request->input('resident_name');
        $resident->resident_cnic = $request->input('resident_cnic');
        $resident->resident_mobile = $request->input('resident_mobile');
        $resident->resident_email = $request->input('resident_email');
        $resident->residing_since = date('Y-m-d',strtotime($request->input('residing_since')));
        


         $resident =  $resident->save();
         echo json_encode($resident);
        
    }

    public function destroy($id){
        DB::table("as_units")->where('id',$id)->delete();
        return redirect()->route('units.index')
        ->with('success','Unit deleted successfully');
    }
}
