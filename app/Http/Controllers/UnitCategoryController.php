<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\UnitCategory;
use App\Models\Unit;
use DB;
use DataTables, Form;       

class UnitCategoryController extends Controller
{
   function __construct()
   {
    $this->middleware('permission:unit-category-list|unit-category-create|unit-category-edit|unit-category-delete', ['only' => ['index','store']]);
    $this->middleware('permission:unit-category-create', ['only' => ['create','store']]);
    $this->middleware('permission:unit-category-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:unit-category-delete', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = UnitCategory::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($model){
            $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
            return $formatDate;
        })
            ->addColumn('action', function($row){
              $btn ='';
              if (auth()->user()->haspermissionTo('unit-category-view') )
                $btn .= htmlBtn('unit_categories.show',$row->id,'warning','eye');
              if (auth()->user()->haspermissionTo('unit-category-edit') )
                $btn.=htmlBtn('unit_categories.edit',$row->id);
              if (auth()->user()->haspermissionTo('unit-category-delete') )
                $btn.= htmDeleteBtn('unit_categories.destroy',$row->id);
               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Unit Category',
            'slug' => 'General Setup',
            'title' => 'Manage Unit Categories',
            'add' => 'Add Unit Category',
        );
        return view('unit_categories.index', compact('data'));
    }

    public function create(){
         $data['page_management'] = array(
            'page_title' => 'Add Unit Category',
            'slug' => 'General Setup',
            'title' => 'Add Unit Category',
        );        
         return view('unit_categories.create', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'unit_cat_name' => 'required|unique:as_unit_categories,unit_cat_name',
        ]);

        UnitCategory::create(
            [
                'unit_cat_code' => $request->input('unit_cat_code'),
                'unit_cat_name' => $request->input('unit_cat_name'),
                'monthly_amount' => $request->input('monthly_amount'),
                'description' => $request->input('description')
            ]
        );

        return redirect()->route('unit_categories.index')
        ->with('success','Unit Category created successfully');
    }

    public function show($id){
         $unitCategory = UnitCategory::find($id);
         $data['page_management'] = array(
            'page_title' => 'View Unit Category',
            'slug' => 'General Setup',
            'title' => 'View Unit Category',
        ); 
         $unitCategory['is_view'] = 1;
        return view('unit_categories.create',compact('unitCategory', 'data'));
    }

    public function edit($id){
        $unitCategory = UnitCategory::find($id);
         $data['page_management'] = array(
            'page_title' => 'Edit Unit Category',
            'slug' => 'General Setup',
            'title' => 'Edit Unit Category',
        ); 
        return view('unit_categories.create',compact('unitCategory', 'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'unit_cat_name' => 'required',
        ]);

        $unitCategory = UnitCategory::find($id);
        $unitCategory->unit_cat_code = $request->input('unit_cat_code');
        $unitCategory->unit_cat_name = $request->input('unit_cat_name');
        $unitCategory->monthly_amount = $request->input('monthly_amount');
        $unitCategory->description = $request->input('description');
        $unitCategory->save();
        return redirect()->route('unit_categories.index')
        ->with('success','Unit Category updated successfully');
    }

    public function destroy($id){
        
        $unit = Unit::where('unit_category_id', $id)->count();
        if($unit == 0)
        {
           DB::table("as_unit_categories")->where('id',$id)->delete();
           return redirect()->route('unit_categories.index')
           ->with('success','Unit Category deleted successfully');
        }
        else{
            return redirect()->route('unit_categories.index')
            ->with('error','Unit exist for this Id,Unit Category can not be deleted ');
        }

    }
}
