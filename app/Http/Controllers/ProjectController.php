<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Block;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Project;
use DB;
use DataTables, Form;

class ProjectController extends Controller
{

    
   function __construct()
   {
     $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','store']]);
     $this->middleware('permission:project-create', ['only' => ['create','store']]);
     $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
     $this->middleware('permission:project-delete', ['only' => ['destroy']]);
 }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($model){
            $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
            return $formatDate;
        })
            ->addColumn('action', function($row){
               $btn ='';
              if (auth()->user()->haspermissionTo('project-view') )
               $btn .= htmlBtn('projects.show',$row->id,'warning','eye');
              if (auth()->user()->haspermissionTo('project-edit') )
               $btn.=htmlBtn('projects.edit',$row->id);
             if (auth()->user()->haspermissionTo('project-delete') )
               $btn.= htmDeleteBtn('projects.destroy',$row->id);

              
               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

         $data['page_management'] = array(
           'page_title' => 'Projects',
            'slug' => 'General Setup',
            'title' => 'Manage Projects',
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
        $data['page_management'] = array(
             'page_title' => 'Add Project',
            'slug' => 'General Setup',
            'title' => 'Manage Project',
            'add' => 'Add Project',
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
                'union_vice_president' => $request->input('union_vice_president'),
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
        $project = Project::find($id);
        $data['page_management'] = array(
             'page_title' => 'View Project',
            'slug' => 'General Setup',
            'title' => 'View Project',
            'add' => 'View Project',
        );
        $project['is_view'] = 1;
        return view('projects.create',compact('project', 'data'));
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
        $data['page_management'] = array(
             'page_title' => 'Edit Project',
            'slug' => 'General Setup',
            'title' => 'Edit Project',
            'add' => 'Edit Project',
        );
        return view('projects.create',compact('project', 'data'));
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
        $project->union_vice_president = $request->input('union_vice_president');
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
        $block = Block::where('project_id', $id)->count();

        if($block == 0)
        {
            DB::table("as_projects")->where('id',$id)->delete();
            return redirect()->route('projects.index')
            ->with('success','Project deleted successfully');
        }
        else{
            return redirect()->route('projects.index')
            ->with('error','BLock exist for this Id,project can not be deleted ');
        }
        
       
    }
}
