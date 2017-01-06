<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthenticationController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function operator()
    {
        if(Auth::check() && Auth::user()->type == 1)
            return redirect('patients');
        return view('operator.login');
    }

    public function patient()
    {
        if(Auth::check() && Auth::user()->type == 0)
            return redirect('reports');
        return view('patient.login');
    }

    public function login(Request $request)
    {

        if($request->type == 1){
            
            if (Auth::attempt(['email' => strtolower($request->username), 'password' => $request->password, 'type' => $request->type])) {
                // Authentication passed...

                return redirect()->intended('patients');
            }
            else{
                return redirect('operator')->withInput(
                    $request->except('password')
                );
            }
        }else{
           if (Auth::attempt(['email' => strtolower($request->username), 'password' => $request->password, 'type' => $request->type])) {
                // Authentication passed...
                return redirect()->intended('reports');
            }else{
                return redirect('patient')->withInput(
                    $request->except('password')
                );
            } 
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}