<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
Use App\OtpCode;
use Carbon\Carbon;

class RegisterController extends Controller
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
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'username' => 'required|unique:users,username'
        ]);

        if($validator->fails()) {
            return response()->json( $validator->errors() , 400);
        }

        $user = User::create($request->all());

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

        event(new UserCreated($user));

        return response()->json([
            'success'=> true,
            'message'=> 'User telah dibuat. Silahkan verifikasi email',
            'data'=> [
                'user' => $user,
                'otp_code' => $otp_code
            ]
        ]);
    }
}
