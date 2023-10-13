<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SMAAppTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class SMAAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeSMAAppToken(Request $request)
    {
        $token = $request->bearerToken();
        $client_code = $request->client_code;
        
        $updateOrCreateSMAAppToken = SMAAppTokens::updateOrCreate(
            ['client_code' => $client_code],
            ['bearer_token' => $token, 'client_code' => $client_code]
        );


        // $flight = SMAAppTokens::updateOrCreate(
        //     ['bearer_token' => $token, 'client_code' => $client_code],
        //     ['client_code' => $client_code]
        // );
        if($updateOrCreateSMAAppToken){
            return response(['success' => true, 'msg' => 'Token stored successfully'], 200);
        }
    }
}
