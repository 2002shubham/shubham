<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurdController extends Controller
{
    public function viewPage(){
        return view('contactform');
    }

    public function insert(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|string|email',
            'contactno'=>'required|digits:10',
            'message'=>'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>'Validation Error',                
                'data'=>$validator->messages(),
            ],400);
        }else{
            $data = [$request->all()];
            return response()->json([
                'status'=>200,
                'data'=>$data,
                'message'=>'Record Insert Successfully',
            ],200);
        }
    }
}
