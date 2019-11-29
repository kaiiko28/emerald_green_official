<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:admin');
	}

	public function showLoginForm()
	{

		return view('auth.adminlogin');
	}

	public function login(Request $request)
	{
		//validate the form data
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		//Attempt to login the user
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
		{
			//if successfull
			return redirect()->intended(route('admin.dashboard'));
		}

		return redirect()->back()->withInput($request->only('email', 'remember'))->with('alert', 'Wrong Email or Password');


		//-----------------------------------------------//
		// $credentials = request()->only(['email', 'password']);

		// if(! Auth::guard('admin')->attempt($credentials))
		// {
		// 	session()->flash('alert', "Invalid email or password");
		// 	session()->flash('aler_status', 'error');
		// 	return redirect()->back();
		// }

		// $user = Auth::guard('admin')->user();

		// session()->flash('alert',"Welcome back {$user}!");
		// session()->flash('alert_status', 'success');
		// return redirect()->to('admin.dashboard');

	}
}
