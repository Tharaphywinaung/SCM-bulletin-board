<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserDao implements UserDaoInterface
{
    //User list action
    public function getUserList()
    {
        $users = User::latest()->paginate(5);
        return $users;
    }

    //User delete action
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->deleted_user_id=Auth::user()->id;
        $user->save();
        $user->delete();
        $post = Post::with('user_id')->where('create_user_id', $id)->delete();
        return $user;
    }

    //User create confirm action
    public function userConfirm($request)
    {
        $user = $request->all();
        if ($profile = $request->file('profile'))
        {
            $path = ('image/');
            $profileImage = date('YmdHis') . "." . $profile->getClientOriginalExtension();
            $profile->move ($path, $profileImage);
            $user['profile'] = "$profileImage";
        }
        return $user;
    }

    //User create action
    public function userCreate($request)
    {
        $user = User::create($request->all());
        $user->password = Hash::make( $request->get('password'));
        $user->save();
        return $user;
    }

    //User edit action
    public function userEdit($id)
    {
        $user = User::find($id);
        return $user;
    }

    //User update confirm action
    public function userUpdateConfirm($request)
    {
        $user = $request->all();
        if ($profile = $request->file('profile'))
        {
            $path = ('image/');
            $profileImage = date('YmdHis') . "." . $profile->getClientOriginalExtension();
            $profile->move ($path, $profileImage);
            $user['profile'] = "$profileImage";
        }
        return $user;
    }

    //User update action
    public function userUpdate($request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return $user;
    }

    //User show action
    public function userDetail($id)
    {
        $user = User::find($id);
        return $user;
    }

    //User search action
    public function userSearch($request)
    {
        $name = trim($request->get('name'));
        if ($name){
            $users = User::where('name','like',"%{$name}%");
        }

        $email = trim($request->get('email'));
        if ($email){
            $users = User::where('email','like',"%{$email}%");
        }
        $created_from = trim($request->get('created_from'));
        $created_to = trim($request->get('created_to'));
        if ($created_from && $created_to){
            $users = User::where('created_at','>=', $created_from)
                        ->where('created_at','<=', $created_to);
        } else if ($created_from){
            $users = User::where('created_at','like',"%{$created_from}%");
        } else if ($created_to) {
            $users = User::where('created_at','like',"%{$created_to}%");
        }
        $users = $users->paginate(5);
        return $users;
    }

    //Password change action
    public function passwordChange($request)
    {
        $user = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return $user;
    }

    public function forgotPassword($request)
    {
        $token = Str::random(64);
        $user = DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return $user;
    }

    public function resetPassword($request)
    {
        $updatePassword = DB::table('password_resets')->where([
                        'email' => $request->email, 
                        'token' => $request->token
                    ])->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return $user;
    }
}