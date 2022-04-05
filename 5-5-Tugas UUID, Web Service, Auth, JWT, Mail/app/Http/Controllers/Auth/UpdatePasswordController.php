<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
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
            'password' => 'required|confirmed|min:6',
        ]);

        if($validator->fails()) {
            return response()->json( $validator->errors() ,400);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return response()->json([
                'success'=> false,
                'message'=> 'User tidak ditemukan!'
                ], 404);
        }

        $user->update([
            'password'=> Hash::make($request->password)
        ]);

        return response()->json([
            'success'=> true,
            'message'=> 'Password telah diubah!',
            'data'=> $user,
        ]);
    }
}
