<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;

class ForgotPasswordController extends Controller
{
    private $userInterface;
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForgetPasswordForm()
    {
        return view('user.forgetPassword');
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate ([
            'email' => 'required|email|exists:users',
        ]);  
        $users = $this->userInterface->forgotPassword($request);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function showResetPasswordForm($token) { 
        return view('user.forgetPasswordLink', ['token' => $token]);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $users = $this->userInterface->resetPassword($request);
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}