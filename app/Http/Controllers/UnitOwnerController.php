<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Unit;
use App\Models\UnitOwner;
use DB;
use DataTables, Form;       

class UnitOwnerController extends Controller
{
   function __construct()
   {
     $this->middleware('permission:unit-owner-list|unit-owner-create|unit-owner-edit|unit-owner-delete', ['only' => ['index','store']]);
     $this->middleware('permission:unit-owner-create', ['only' => ['create','store']]);
     $this->middleware('permission:unit-owner-edit', ['only' => ['edit','update']]);
     $this->middleware('permission:unit-owner-delete', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = UnitOwner::with('unit')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($model){
            $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
            return $formatDate;
        })
            ->addColumn('action', function($row){
               $btn = htmlBtn('unit_owners.show',$row->id,'warning','eye');
               $btn.=htmlBtn('unit_owners.edit',$row->id);
               $btn.= htmDeleteBtn('unit_owners.destroy',$row->id);

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }



        $data['page_management'] = array(
            'page_title' => 'Unit Owner',
            'slug' => 'General Setup',
            'title' => 'Manage Unit Owners',
            'add' => 'Add Unit Owner',
        );
     

        return view('unit_owners.index', compact('data'));
    }

    public function create(){
        $units  =  Unit::get();
       
         $data['page_management'] = array(
            'page_title' => 'Add Unit Owner',
            'slug' => 'General Setup',
            'title' => 'Add Unit Owner',
        );        
         return view('unit_owners.create', compact('data','units'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'owner_name' => 'required|unique:as_unit_owners,owner_name',
        ]);

    
        UnitOwner::create(
            [
                'soceity_id' => $request->input('soceity_id'),
                'unit_id' => $request->input('unit_id'),
                'owner_name' => $request->input('owner_name'),
                'owner_cnic' => $request->input('owner_cnic'),
                'identity_type' => $request->input('identity_type'),
                'owner_email' => $request->input('owner_email'),
                'mobile_no' => $request->input('mobile_no'),
                'ptcl_no' => $request->input('ptcl_no'),
                'owner_since' => date('Y-m-d',strtotime($request->input('owner_since'))),
                'is_tenant' => isset($request->is_tenant) ? 1 : 0,
                'current_tenant' => $request->input('current_tenant'),
                'owner_address' => $request->input('owner_address'),
            ]
        );

        return redirect()->route('unit_owners.index')
        ->with('success','Unit created successfully');
    }

    public function show($id){
        $permission = UnitCategory::find($id);
        $data['page_management'] = array(
            'page_title' => 'Show expense_categories',
            'slug' => 'Show'
        );

        return view('unit_owners.show',compact('permission', 'data'));
    }

    public function edit($id){
         $unit_owner = UnitOwner::find($id);
         $unit_owner['owner_since'] =  date('d-m-Y',strtotime($unit_owner['owner_since']));

        $units = Unit::get();

         $data['page_management'] = array(
            'page_title' => 'Edit Unit Owner',
            'slug' => 'General Setup',
            'title' => 'Edit Unit Owner',
        ); 
        return view('unit_owners.create',compact('units','unit_owner', 'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'owner_name' => 'required',
        ]);

        $unitOwner = UnitOwner::find($id);
        $unitOwner->unit_id = $request->input('unit_id');
        $unitOwner->owner_name = $request->input('owner_name');
        $unitOwner->owner_cnic = $request->input('owner_cnic');
        $unitOwner->owner_email = $request->input('owner_email');
        $unitOwner->mobile_no = $request->input('mobile_no');
        $unitOwner->ptcl_no = $request->input('ptcl_no');
        $unitOwner->is_tenant = isset($request->is_tenant) ? 1 : 0;
        $unitOwner->owner_since = date('Y-m-d',strtotime($request->input('owner_since')));
        $unitOwner->current_tenant = $request->input('current_tenant');
        $unitOwner->owner_address = $request->input('owner_address');


        $unitOwner->save();
        return redirect()->route('unit_owners.index')
        ->with('success','Unit Owner updated successfully');
    }

    public function destroy($id){
        DB::table("as_unit_owners")->where('id',$id)->delete();
        return redirect()->route('unit_owners.index')
        ->with('success','Unit Owner deleted successfully');
    }
}
