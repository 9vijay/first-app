<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\ToastrServiceProvider;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('login.login');
    }
    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect('profile');
        }else{
            toastr()->error('Email and password not matched !');
            return redirect('login');
        }
    }
     /**
       * logout user
     */
    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}