<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
Use App\OtpCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
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
            'otp' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json( $validator->errors() , 400);
        }

        $otpCode = OtpCode::where('otp',$request->otp)->first();
        if(!$otpCode)
        {
            return response()->json([
                'success'=> false,
                'message'=> 'OTP Code tidak ditemukan!'
                ], 404);
        }

        $user = $otpCode->user;

        if( $otpCode->valid_until < Carbon::now()){
            return response()->json([
                'success'=> false,
                'message'=> 'OTP Code sudah kadaluarsa!'
            ], 400);
        }

        $user->update([
            'email_verified_at' => Carbon::now()
        ]);

        $otpCode->delete();

        return response()->json([
                'success'=> true,
                'message'=> 'Selamat! Akun anda terverifikasi',
                'data' => $user
        ]);
    }
}
