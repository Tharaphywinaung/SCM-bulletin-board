<?php

namespace App\Services\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Contracts\Dao\User\UserDaoInterface;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    //Show user list for admin
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    public function userDelete($id)
    {
        return $this->userDao->userDelete($id);
    }

    public function userCreate($request)
    {
        return $this->userDao->userCreate($request);
    }

    public function userConfirm($request)
    {
        return $this->userDao->userConfirm($request);
    }

    public function userDetail($id)
    {
        return $this->userDao->userDetail($id);
    }

    public function userSearch($request)
    {
        return $this->userDao->userSearch($request);
    }

    public function userEdit($id)
    {
        return $this->userDao->userEdit($id);
    }

    public function userUpdate($id, $request)
    {
        return $this->userDao->userUpdate($id, $request);
    }

    public function userUpdateConfirm($request)
    {
        return $this->userDao->userUpdateConfirm($request);
    }

    public function passwordChange($request)
    {
        return $this->userDao->passwordChange($request);
    }

    public function forgotPassword($request)
    {
        return $this->userDao->forgotPassword($request);
    }

    public function resetPassword($request)
    {
        return $this->userDao->resetPassword($request);
    }
}