<?php

namespace App\Http\Controllers;

use App\ProductConfigurations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public $successStatus = 200;

    public function login(){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $generateToken = $user->createToken('Access Token');
            $accessToken = $generateToken->accessToken;


            return response()->json([
                'token_type' => 'Bearer',
                'expires_in' => now()->addMinute(5),
                'access_token' => $accessToken,

            ], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function details()
    {
        $user = Auth::user();
        if($user){
            return response()->json(['success' => $user], $this->successStatus);
        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }

    }

    public function suggestedMyPc(Request $request)
    {
        $input = [
            $request->age,
            $request->performance,
            $request->gaming_performance,
        ];

        if(!is_null($request->regular_usage)){
            $input = array_merge($input,$request->regular_usage);
        }

        if(!is_null($request->applications)){
            $input = array_merge($input,$request->applications);
        }

        $product_details = ProductConfigurations::all();

        $final_grade = [
            'g1' => true,
            'g2' => true,
            'g3' => true,
            'g4' => true,
            'g5' => true,
            'g6' => true,
            'g7' => true,
            'g8' => true,
        ];

        $result = [];

        foreach($input as $single){
            if(is_null($single)) continue;

            foreach($product_details as $product_detail){
                $single_options = json_decode($product_detail->options);

                if(!in_array($single,$single_options)){
                    $final_grade[$product_detail->grade] = false;
                }
                $grades[$product_detail->grade] = json_decode($product_detail->products);

            }
        }

        foreach($final_grade as $key=>$value){
            if($value){
                $product = $grades[$key];
                $result = array_merge($result,$product);
            }
        }

        $message = 'success';
        $status_code = 1000;    // DATA FOUND
        if(count($result) == 0){
            $message = 'Nothing Suggested. Please change your parameter.';
            $status_code = 9999;
        }

        $response = [
            'status_code' => $status_code, // DATA FOUND
            'message' => $message,
            'result' => $result,
        ];

        return response()->json($response,$this->successStatus);
    }
}
