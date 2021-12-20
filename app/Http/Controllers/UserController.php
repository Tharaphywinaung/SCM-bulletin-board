<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contracts\Services\User\UserServiceInterface;
use App\Rules\MatchOldPassword;
use Session;
use Hash;
use Auth;

class UserController extends Controller
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

    //Show User Login Screen
    public function login()
    {
        return view('user.login');
    }

    //Process User Login
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('post.index')
                        ->withSuccess('Signed in');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'password' => 'Wrong Password',
            'approve' => 'Account not approved',
        ]);
    }

    //User Logout
    public function logOut() {
        Session::flush();
        Auth::logout();
        return Redirect('user/login');
    }

    //Display a listing of the resource.
    public function index()
    {
        $users = $this->userInterface->getUserList();
        return view('user.index',compact('users'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('user.create_user');
    }

    //Show the confirm screen for creating a new resource.
    public function confirm(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'confirm_password'=>'required|same:password',
            'type'=>'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg,PNG|max:2048',
        ]);
        $users = $this->userInterface->userConfirm($request);
        return view('user.create_user_confirm',compact('users'));
    }
    
    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $users = $this->userInterface->userCreate($request);
        return redirect()->route('user.index')->with('success','User Created Successfully');
    }

    //Display the specified resource.
    public function show($id)
    {
        $user = $this->userInterface->userDetail($id);
        return view('user.user_profile',compact('user'));
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $users = $this->userInterface->userEdit($id);
        return view('user.update_user',compact('users'));
    }

    //Show the confirm screen for editing the specified resource.
    public function updateConfirm(Request $request)
    {
        $users = $this->userInterface->userUpdateConfirm($request);
        return view('user.update_user_confirm',compact('users'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $user = $this->userInterface->userUpdate($request, $id);
        return redirect()->route('user.index')->with('success','User Updated Successfully');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $users = $this->userInterface->userDelete($id);
        return redirect()->route('user.index')->with('success','Deleted Successfully');
    }

    //Search the specified resource from storage.
    public function userSearch(Request $request)
    {
        $users = $this->userInterface->userSearch($request);
        return view('user.index',compact('users'));
    }

    //Show password change screen
    public function password()
    {
        return view('user.change_user_password');
    }

    //Process of password change
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password','required'],
        ]);
        $user = $this->userInterface->passwordChange($request);
        return redirect()->route('post.index');
    }
}