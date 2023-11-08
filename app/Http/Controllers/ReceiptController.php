<?php

namespace App\Http\Controllers;

use App\Models\receipt;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Project;
use App\Models\UnitCategory;
class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { if ($request->ajax()) {
        $receipts = Receipt::with('project')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('created_at', function($model){
        $formatDate = date('d-m-Y H:i:s',strtotime($model->created_at));
        return $formatDate;
    })
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

    return view('receipt.index', compact('data'));


       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks  =  Block::get();
        $unit_categories  =  UnitCategory::get();
        $projects  =  Project::get();
        $data['page_management'] = array(
            'page_title' => 'Create New Receipt',
            'slug' => 'Transaction',
             'title' => 'Manage Receipts',
            'add' => 'Add Receipt',
        );
        return view('receipt.create', compact('data','blocks','projects','unit_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(receipt $receipt)
    {
        //
    }
}
