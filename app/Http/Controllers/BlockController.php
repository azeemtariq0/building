<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Block;
use DB;
use DataTables, Form;       

class BlockController extends Controller
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
            $data = Block::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

               // $btn = "<a href='".route('blocks.show',$row->id)."' class='btn btn-success btn-sm'><span>Show</span></a>";

               $btn= "<a href='".route('blocks.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";

               $btn.= Form::open(['method' => 'DELETE','route' => ['blocks.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

          $data['page_management'] = array(
            'page_title' => 'Block',
            'slug' => 'General Setup',
            'title' => 'Manage Blocks',
            'add' => 'Add Block',
        );
        return view('blocks.index', compact('data'));
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
            'page_title' => 'Create New Block',
            'slug' => 'Create'
        );
        return view('blocks.create', compact('data'));
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
            'block_name' => 'required|unique:as_blocks,block_name',
        ]);

        $role = Block::create(
            [
                'block_code' => $request->input('block_code'),
                'block_name' => $request->input('block_name'),
                'description' => $request->input('description')
            ]
        );

        return redirect()->route('blocks.index')
        ->with('success','Block created successfully');
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
            'page_title' => 'Show Blocks',
            'slug' => 'Show'
        );

        return view('blocks.show',compact('permission', 'data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = block::find($id);
        $data['page_management'] = array(
            'page_title' => 'Edit Project',
            'slug' => 'Edit'
        );
        return view('blocks.create',compact('block', 'data'));
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
            'block_name' => 'required',
            // 'permission' => 'required',
        ]);
        
        $block = block::find($id);
        $block->block_code = $request->input('block_code');
        $block->block_name = $request->input('block_name');
        $block->description = $request->input('description');
        $block->save();
        
        // $role->syncPermissions($request->input('permission'));
        
        return redirect()->route('blocks.index')
        ->with('success','block updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("blocks")->where('id',$id)->delete();
        return redirect()->route('blocks.index')
        ->with('success','block deleted successfully');
    }
}
