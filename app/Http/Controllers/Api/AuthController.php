<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {

        //validaciones
        $response = ["success" => false];

        // validacion 1 |
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $response = ["error" => $validator->errors()];
            return response()->json($response, 200);
        }


        $input =  $request->all();
        $input["password"] = bcrypt($input['password'] ?? '');
        $user = User::create($input);
        $user->assignRole('admin');

        $response["success"] = true;


        return response()->json($response, 200);
    }



    public function login(Request $request)
    {



        //validaciones
        $response = ["success" => false];

        // validacion 1 |
        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $response = ["error" => $validator->errors()];
            return response()->json($response, 200);
        }

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
            $user->hasRole('admin');
            $response['token'] = $user->createToken('jwt')->plainTextToken;
            $response['user'] = $user;
            $response['success'] = true;
        }


        return response()->json($response, 200);
    }

   /* public function logout(){
        $response=["success"=>false];
        auth()->user()->tokens()->delete();
        $response=["success"=true];
        return response()->json($response, 200);

    }*/
}
