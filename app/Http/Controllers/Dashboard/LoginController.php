<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        //
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request){

        // validate by Request.

        // insert in DB.
        $remember_me = $request->has('remember_me') ? true : false;

        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),'password' => $request->input('password')],$remember_me)){

            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with([
            'message' => 'There is a mistake in the data',
            'alert-type' => 'danger',
        ]);
    }

    public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('admin.getLogin');
    }


}
