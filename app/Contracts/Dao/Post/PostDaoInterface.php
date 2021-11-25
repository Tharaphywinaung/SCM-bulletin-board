<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface 
{
    public function getPostList($request);
    public function postDelete($id);
    public function postConfirm($request);
    public function postCreate($request);
    public function postEdit($id);
    public function postUpdateConfirm($request);
    public function postUpdate($request, $id);
    public function postSearch($request);
}