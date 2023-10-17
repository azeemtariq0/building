<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Project;
use DB;
use DataTables, Form;

class ProjectController extends Controller
{
   function __construct()
   {
     // $this->middleware('projects:role-create', ['only' => ['create','store']]);
     // $this->middleware('projects:role-edit', ['only' => ['edit','update']]);
     // $this->middleware('projects:role-delete', ['only' => ['destroy']]);
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
            $data = Project::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

               // $btn = "<a href='".route('projects.show',$row->id)."' class='btn btn-success btn-sm'><span>Show</span></a>";

               $btn= "<a href='".route('projects.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";

               $btn.= Form::open(['method' => 'DELETE','route' => ['projects.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

         $data['page_management'] = array(
            'page_title' => 'Project',
            'slug' => 'General Setup',
            'title' => 'Manage Project',
            'add' => 'Add Project',
        );

        return view('projects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $permission = Permission::get();
        // return view('permissions.create',compact('permission'));
        $data['page_management'] = array(
            'page_title' => 'Create New Project',
            'slug' => 'Create'
        );
        return view('projects.create', compact('data'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|unique:as_projects,project_name',
        ]);

        $role = Project::create(
            [
                'project_code' => $request->input('project_code'),
                'project_name' => $request->input('project_name'),
                'union_name' => $request->input('union_name'),
                'union_president' => $request->input('union_president'),
                'union_voice_president' => $request->input('union_voice_president'),
                'union_secretary' => $request->input('union_secretary'),
                'union_joint_secretary' => $request->input('union_joint_secretary'),
                'union_accountant' => $request->input('union_accountant'),
                'union_other_1' => $request->input('union_other_1'),
                'union_other_2' => $request->input('union_other_2'),
                'union_other_3' => $request->input('union_other_3'),
                'union_other_4' => $request->input('union_other_4'),
            ]
        );

        return redirect()->route('projects.index')
        ->with('success','Project created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        // ->where("role_has_permissions.role_id",$id)
        // ->get();
        

        $data['page_management'] = array(
            'page_title' => 'Show Permissions',
            'slug' => 'Show'
        );

        return view('permissions.show',compact('permission', 'data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        // $permission = Permission::get();
        /*$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        

        return view('permissions.edit',compact('role','permission','rolePermissions'));*/


        $data['page_management'] = array(
            'page_title' => 'Edit Project',
            'slug' => 'Edit'
        );
        return view('projects.edit',compact('project', 'data'));
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
        $this->validate($request, [
            'project_name' => 'required',
            // 'permission' => 'required',
        ]);
        
        $project = Project::find($id);
        $project->project_name = $request->input('project_name');
        $project->union_name = $request->input('union_name');
        $project->union_president = $request->input('union_president');
        $project->union_voice_president = $request->input('union_voice_president');
        $project->union_secretary = $request->input('union_secretary');
        $project->union_joint_secretary = $request->input('union_joint_secretary');
        $project->union_accountant = $request->input('union_accountant');
        $project->union_other_1 = $request->input('union_other_1');
        $project->union_other_2 = $request->input('union_other_2');
        $project->union_other_3 = $request->input('union_other_3');
        $project->union_other_4 = $request->input('union_other_4');
        $project->save();
        
        // $role->syncPermissions($request->input('permission'));
        
        return redirect()->route('projects.index')
        ->with('success','Project updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
        ->with('success','Role deleted successfully');
    }
}
