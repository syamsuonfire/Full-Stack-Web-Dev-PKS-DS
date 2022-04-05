<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make( $request->all() , [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json( $validator->errors() , 400);
        }

         $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email dan Password tidak sesuai'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Anda berhasil login',
            'data' => [
                'user'=> auth()->user(),
                'token'=> $token
            ],
        ]);
    }
}
