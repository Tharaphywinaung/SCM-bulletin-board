<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    //get postlist
    public function getPostList($request);

    //post delete
    public function postDelete($id);

    //post create confirm
    public function postConfirm($request);

    //post store
    public function postCreate($request);

    //post eidt
    public function postEdit($id);

    //post update confirm
    public function postUpdateConfirm($request);

    //post update
    public function postUpdate($request, $id);

    //post search
    public function postSearch($request);
}