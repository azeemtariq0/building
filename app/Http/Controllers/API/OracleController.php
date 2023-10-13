<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\SMAAppTokens;
use DB;


class OracleController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $token = $request->bearerToken();
        if ($token != "") {
            $getExistingToken = SMAAppTokens::select('bearer_token', 'client_code')
                ->where('client_code', $request->fund_code)
                ->where('bearer_token', $token)
                ->first();
            if (!empty($getExistingToken)) {

                $data = DB::connection('oracle')->table('amc_users')
                    ->select('*')
                    ->where('fund_code', $request->fund_code)
                    ->get()
                    ->first();
                $success = '';
                $message = "";
                $response = array();

                if (!empty($data)) {
                    $response = $data;
                    $message = 'Data Retrieved Successfully';
                    $success = true;
                } else {
                    $message = 'No Record Found';
                    $success = false;
                    $response = "";
                }
                return response([
                    "success" => $success,
                    'message' => $message,
                    'data' => $response,
                ], 200);

                
            } else {
                return response([
                    "success" => false,
                    'message' => "Please provide valid auth token",
                    'data' => [],
                ], 200);
            }
        } else {
            return response([
                "success" => false,
                'message' => "Please provide auth token",
                'data' => [],
            ], 200);
        }
    }

    public function authenticateTerminalUser(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'error_type' => 'Validation Error']);
        }

        // $data = DB::connection('oracle')->select(DB::raw('select check_client(\'V1151\',upper(\'bma1234\')) as check_client from dual limit'));
        // die();
        $data = DB::connection('oracle')->select(DB::raw("select check_client('" . $request->username . "', upper('" . $request->password . "')) as is_client from dual limit"));

        if (!empty($data)) {
            $response = json_decode(json_encode($data[0]));
            $message = 'Data Retrieved Successfully';
            $success = true;
        } else {
            $message = 'No Record Found';
            $success = false;
            $response = "";
        }
        return response([
            "success" => $success,
            'message' => $message,
            'data' => $response,
        ], 200);
    }
}
