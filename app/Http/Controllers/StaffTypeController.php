<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\StaffType;
use DB;
use DataTables, Form;       

class StaffTypeController extends Controller
{
   function __construct()
   {
     // $this->middleware('projects:role-create', ['only' => ['create','store']]);
     // $this->middleware('projects:role-edit', ['only' => ['edit','update']]);
     // $this->middleware('projects:role-delete', ['only' => ['destroy']]);
   }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = StaffType::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
           ->editColumn('created_at', function($model){
            $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
            return $formatDate;
        })
            ->addColumn('action', function($row){
               $btn= "<a href='#' class='btn btn-info btn-sm add_staff' data-id=".$row->id."> <span>Edit</span></a>";
               $btn.= Form::open(['method' => 'DELETE','route' => ['staff_types.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Staff Type',
            'slug' => 'General Setup',
            'title' => 'Manage Staff Types',
            'add' => 'Add Staff Type',
        );
        return view('staff_types.index', compact('data'));
    }

    public function staffTypeSaveOrUpdate(Request $request)
    {
        $_return = ['success'=>true,'msg'=>'Staff Type Created Successfully!'];
        if(!$request->id){
            StaffType::create(
                [
                    'staff_name' => $request->input('staff_name'),
                ]
            );
        }else{
            $_return = ['msg'=>'Staff Type Updated Successfully!'];
            $staffType = StaffType::find($request->id);
            $staffType->staff_name = $request->input('staff_name');
            $staffType->save();
        }
        echo json_encode($_return);
        exit;
    }

 

    public function destroy($id){
        DB::table("as_staff_type")->where('id',$id)->delete();
        return redirect()->route('staff_types.index')
        ->with('success','Staff Type deleted successfully');
    }
}
