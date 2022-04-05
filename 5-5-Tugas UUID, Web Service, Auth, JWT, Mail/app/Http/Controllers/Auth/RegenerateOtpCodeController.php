<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegenerateOtpCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
Use App\OtpCode;
use Carbon\Carbon;

class RegenerateOtpCodeController extends Controller
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
        ]);

        if($validator->fails()) {
            return response()->json( $validator->errors() , 400);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return response()->json([
                'success'=> false,
                'message'=> 'User tidak ditemukan'
                ], 404);
        }


        if ($user->otpCode) {
            $user->otpCode->delete();
        }

        do {
            $otp =mt_rand(100000,999999);
            $check = OtpCode::where('otp',$otp)->first();
        } while($check);

        $validUntil = Carbon::now()->addMinutes(15);
        $otp_code = OtpCode::create([
                'otp' => $otp,
                'valid_until' => $validUntil,
                'user_id' => $user->id
        ]);

        event(new RegenerateOtpCode($user));

        return response()->json([
            'success'=> true,
            'message'=> 'OTP telah diregenerasi. Silahkan periksa email anda',
            'data'=> [
                'user' => $user,
                'otp_code' => $otp_code
            ]
        ]);
    }
}
