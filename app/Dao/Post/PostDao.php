<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostDao implements PostDaoInterface
{
    //Post list action
    public function getPostList($request)
    {
        $posts = Post::latest()->paginate(5);
        $id = Auth::user()->id;
        $created_user_id = User::find($id);
        if ($created_user_id->type == '0')
        {
            $posts = Post::latest()->paginate(5);
        } else {
            $posts = Post::where('create_user_id','=',$id)->paginate(5);
        }
        return $posts;
    }

    //Post delete action
    public function postDelete($id)
    {
        $post = Post::find($id);
        $post->deleted_user_id=Auth::user()->id;
        $post->save();
        $post->delete();
        return $post;
    }

    //Post create confirm action
    public function postConfirm($request)
    {
        $post = $request->all();
        return $post;
    }

    //Post create action
    public function postCreate($request)
    {
        $post = Post::create($request->all());
        $post->save();
        return $post;
    }
    
    //Post edit action
    public function postEdit($id)
    {
        $post = Post::find($id);
        return $post;
    }

    //Post update confirm action
    public function postUpdateConfirm($request)
    {
        $post = $request->all();
        return $post;
    }

    //Post update action
    public function postUpdate($request, $id)
    {
        $post = Post::find($id);
        $input = $request->all();
        $post->update($input);
        $post->save();
        return $post;
    }

    //Post search action
    public function postSearch($request)
    {
        $id = Auth::user()->id;
        $created_user_id = User::find($id);
        $key = trim($request->get('search'));
        if ($created_user_id->type == "1") {
            $post = Post::query()
            ->where('create_user_id','=',$id)
            ->where('title', 'like', "%{$key}%")
            ->Where('description', 'like', "%{$key}%")
            ->get();
        }else{
            $post = Post::with('user_id')->orWhereHas('user_id',function($query) use($key) {
                $query->where('name',$key);
                })->orWhere('title','LIKE','%'.$key.'%')
                  ->orWhere('description','LIKE','%'.$key.'%')->paginate(10);
        }
        return $post;
    }
}