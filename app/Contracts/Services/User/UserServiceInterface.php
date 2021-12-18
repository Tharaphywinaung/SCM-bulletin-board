<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    public function getUserList();
    public function userDelete($id);
    public function userCreate($request);
    public function userConfirm($request);
    public function userDetail($id);
    public function userSearch($request);
    public function userEdit($id);
    public function userUpdate($id, $request);
    public function userUpdateConfirm($request);
    public function passwordChange($request);
    public function forgotPassword($request);
    public function resetPassword($request);
}