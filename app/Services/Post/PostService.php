<?php

namespace App\Services\Post;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Contracts\Dao\Post\PostDaoInterface;

class PostService implements PostServiceInterface
{
    private $PostDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    //Show user list for admin
    public function getPostList($request)
    {
        return $this->postDao->getPostList($request);
    }

    public function postDelete($id)
    {
        return $this->postDao->postDelete($id);
    }

    public function postConfirm($request)
    {
        return $this->postDao->postConfirm($request);
    }

    public function postCreate($request)
    {
        return $this->postDao->postCreate($request);
    }

    public function postEdit($id)
    {
        return $this->postDao->postEdit($id);
    }

    public function postUpdateConfirm($request)
    {
        return $this->postDao->postUpdateConfirm($request);
    }

    public function postUpdate($request, $id)
    {
        return $this->postDao->postUpdate($request, $id);
    }

    public function postSearch($request)
    {
        return $this->postDao->postSearch($request);
    }
}