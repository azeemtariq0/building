<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use App\Models\Project;
use Hash;
use DB;
use DataTables, Form;

class UserController extends Controller
{
   function __construct()
   {
     $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
     $this->middleware('permission:user-create', ['only' => ['create','store']]);
     $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
     $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

        public function index(Request $request)
        {
                $role_list = Role::select('*')->get();
            if ($request->ajax()) {
                $data = User::where('soceity_id',auth()->user()->soceity_id)->select('*');
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('roles', function($row){
                 $roles = "";
                 if(!empty($row->getRoleNames())){
                    foreach($row->getRoleNames() as $v){
                        if($v!="View Only"){
                        $roles.= '<span class="label label-success label-role current_role"> '.$v.' </span> ';
                         }
                        if (auth()->user()->haspermissionTo('user-edit') && $v!='App Admin')
                        $roles.= ' &nbsp <span class="label label-info label-role assign_role" data-id='.$row->id.'>  Assign Role <i class="fa fa-edit"></> </span>';
                    }
                }

                return $roles;
            })

                ->addColumn('action', function($row){
                $btn = "";
                  if(auth()->user()->haspermissionTo('user-view') )
                    $btn.= htmlBtn('users.show',$row->id,'warning','eye');
                  if (auth()->user()->haspermissionTo('user-edit') )
                    $btn.=htmlBtn('users.edit',$row->id);
                  if(auth()->user()->haspermissionTo('user-delete') )
                   $btn.= htmDeleteBtn('users.destroy',$row->id);
                 
                 return $btn;
             })
                ->rawColumns(['roles', 'action'])
                // ->rawColumns([])
                ->make(true);
            }
            $data['page_management'] = array(
                'page_title' => 'Users Management',
                'slug' => ''
            );
            
            return view('users.index', compact('data','role_list'));
        }

        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function assignRoleToUser(Request $request)
    {
            $_return = ['msg'=>'Staff Type Updated Successfully!'];
            $role = Role::where('id',$request->role_id)->first();
            $user = User::find($request->id);
            DB::table('model_has_roles')->where('model_id',$request->id)->delete();
            $user->assignRole($role->name);
         $_return = ['success'=>true,'msg'=>'Assign Role Successfully!'];
        echo json_encode($_return);
        exit;
    }

    public function create()
    {
        $projects  =  Project::where('soceity_id',auth()->user()->soceity_id)->get();
        // $data['page_management'] = array(
        //         'page_title' => 'Create New User',
        //         'slug'=>'Create',
        //     );


        $data['page_management'] = array(
            'page_title' => 'User',
            'slug' => 'Permission',
            'title' => 'Add User',
            'add' => 'Add Unit',
        );
     
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles', 'projects','data'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
        $user = User::create($input);
        $user->assignRole('View Only');
        
        return redirect()->route('users.index')
        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data['page_management'] = array(
                'page_title' => 'Show User',
                'slug'=>'Show',
            );
        return view('users.show',compact('user', 'data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects  =  Project::get();
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

         $data['page_management'] = array(
            'page_title' => 'User',
            'slug' => 'Permission',
            'title' => 'Edit User',
            'add' => 'Edit Unit',
        );
        
        return view('users.create',compact('user','roles','userRole', 'projects','data'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            // 'roles' => 'required'
        ]);
        
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        
        $user = User::find($id);
        $user->update($input);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();
        
        // $user->assignRole('View Only');
        
        return redirect()->route('users.index')
        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
        ->with('success','User deleted successfully');
    }
}