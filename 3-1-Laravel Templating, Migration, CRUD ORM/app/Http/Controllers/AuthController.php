<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formregister() {
        return view('page.register');
    }

    public function register(Request $request) {
       
        // dd($request->all());
        $namadepan = $request['firstname'];
        $namabelakang= $request['lastname'];
        
        return view('page.welcome', compact ("namadepan","namabelakang"));
    }


    public function welcome() {
        return view('page.welcome');
    }
    //
}
