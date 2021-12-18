<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

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
}