<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Models\Receipt;
use App\Models\Unit;
use App\Models\Block;
use App\Models\Project;
use App\Models\UnitCategory;
use App\Models\ReceiptType;
use App\Models\GenerateReceivable;


use Validator;
use DB;

class ApploginController extends Controller
{
    
    public function login(Request $request)
    {
      
        $credentials = $request->only('email', 'password');
        $validate = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }
        $email = User::where('email', $request->email)->first();

        if ($email) {
            $checkPass = Hash::check($request->password, $email->password);
            if ($checkPass) {
                try {
                    // $token = JWTAuth::attempt($credentials);

                    // if (!$token) {
                        // return response()->json(['error' => 'Invalid Login credentials'], 400);
                    // } else {
                        // return response()->json(['success'=>true,'status'=>200,'response' => $email], 200);
                          return response()->json( $email, 200);
                        // return response()->json(['token' => $token], 200);
                    // }

                } catch (JWTException $e) {
                    return response()->json(['error' => $e->getMessage()], 400);
                }
            } else {
                return response()->json(['error' => 'wrong password'], 400);
            }
        } else {
            return response()->json(['error' => 'email does not exists'], 400);
        }
        return response()->json(['token' => $token], 200);
    }

    public function getReceipts(Request $request){
        $data = Receipt::with('project', 'block', 'unit','unit_category','receipt_type');
        $data = $data->where('status',0); 
        $data = $data->get();
        return response()->json($data, 200);
        //$data = $data->paginate(10); 
        // return response()->json(['success'=>true,'status'=>200,'response' => $data], 200);


    }
    public function receivableProcess(){
        $current_date = date('Y-m-d',strtotime(NOW()));
        $day = (int) date('d',strtotime(NOW()));
        $units = Unit::with('unit_category')->where('last_updated','!=',$current_date)->get();
        $count = 0;
        foreach ($units as $key => $value) {
            
            $unit = Unit::where('id',$value->id)->first();
            $last_amount = $unit->out_standing_amount;
            $actual_amount = $last_amount + +$value->unit_category->monthly_amount ?? 0;
            $unit->out_standing_amount = $unit->out_standing_amount+$value->unit_category->monthly_amount ?? 0;
            $unit->last_updated =  $current_date;
            $unit->update();

            GenerateReceivable::create([
                                'unit_id'=>$value->id,
                                'last_amount'=> $last_amount,
                                'actual_amount'=> $actual_amount,
                                'date'=>$current_date,
            ]);
            $count++;
        }
        return response()->json(['success'=>true,'status'=>200,'response' => ['no_of_record'=>$count]], 200);
    }
    public function logout(Request $request)
    {
        $validate = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }
        try {
            // JWTAuth::invalidate($request->token);
            return response()->json(['success' => 'logged out successfully'], 200);
        } catch (JWTException $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

   
}