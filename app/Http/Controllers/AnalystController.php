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

class AnalystController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:analyst-list|analyst-create|analyst-edit|analyst-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:analyst-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:analyst-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:analyst-delete', ['only' => ['destroy']]);
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
            $data = ResearchAnalyst::orderBy('analyst_name', 'ASC');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = "<a href='" . route('analyst.edit', $row->id) . "' class='btn btn-success btn-xs white'><i class='fa fa-edit'></i> Edit</a>";

                    $btn .= Form::open(['method' => 'DELETE', 'route' => ['analyst.destroy', $row->id], 'style' => 'display:inline']);
                    $btn .= Form::button('<i class="fa fa-times"></i>Delete', ['class' => 'btn btn-danger btn-xs white', 'type' => 'submit']);
                    $btn .= Form::close();

                    return $btn;
                })
                ->rawColumns(['analyst_name', 'action'])
                ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Analysts Management',
            'slug' => 'Listing'
        );

        return view('analyst.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_management'] = array(
            'page_title' => 'Add Analyst',
            'slug' => 'Add'
        );
        return view('analyst.create', compact('data'));
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
            'analyst_name' => 'required'
        ]);
        
        ResearchAnalyst::create([
            'analyst_name' => $request->input('analyst_name')
        ]);
        
        return redirect()->route('analyst.index')
            ->with('success', 'Data added successfully');
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
        return view('analyst.show', compact('researchUpload', 'data'));
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
            'page_title' => 'Edit Analyst',
            'slug' => 'Edit'
        );
        $analyst = ResearchAnalyst::find($id);

        return view('analyst.edit', compact('data', 'analyst'));
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
            'analyst_name' => 'required'
        ]);

        ResearchAnalyst::where('id', $id)
            ->update([
                'analyst_name' => $request->input('analyst_name'),
            ]);

        return redirect()->route('analyst.index')
            ->with('success', 'Data updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::withTrashed()->where('id', 1)->restore();
        ResearchAnalyst::find($id)->delete();
        // DB::table("research_uploads")->where('id',$id)->delete();
        return redirect()->route('analyst.index')
            ->with('success', 'Data deleted successfully');
    }
}
