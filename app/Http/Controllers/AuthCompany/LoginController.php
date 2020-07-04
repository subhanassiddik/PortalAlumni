<?php

namespace App\Http\Controllers\AuthCompany;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('Company.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
        
      $credential = [
            'email' => $request->email, 
            'password' => $request->password
        ];

      // Attempt to log the user in
      if (Auth::guard('company')->attempt($credential, $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('vacancy.home'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect('/');
    }   
}
