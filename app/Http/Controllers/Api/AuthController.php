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

 public function logout(Request $request){
         $user = $request->user(); // usuario autenticado por token

    if ($user) {
        $user->tokens()->delete(); // elimina todos los tokens de ese usuario
        return response()->json(['success' => true], 200);
    }

    return response()->json(['success' => false, 'message' => 'No user authenticated'], 401);
    }
}
