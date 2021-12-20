<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    //Get user list
    public function getUserList();

    //User delete
    public function userDelete($id);

    //User create confirm
    public function userConfirm($request);

    //User create
    public function userCreate($request);

    //Show user details
    public function userDetail($id);

    //User search
    public function userSearch($request);

    //User profile edit
    public function userEdit($id);

    //User update confirm
    public function userUpdateConfirm($request);

    //User update
    public function userUpdate($id, $request);

    //User password change
    public function passwordChange($request);

    //User password forgot
    public function forgotPassword($request);

    //User password reset
    public function resetPassword($request);
}