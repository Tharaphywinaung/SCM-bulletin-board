<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validor;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\Post\PostServiceInterface;
use Session;

class PostController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
      $this->postInterface = $postInterface;
    }

    //Display a listing of the resource.
    public function index(Request $request)
    {
        $posts = $this->postInterface->getPostList($request);
        return view('post.index',compact('posts'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('post.create_post');
    }

    //Show the confirm screen for creating a new resource.
    public function confirm(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $post = $this->postInterface->postConfirm($request);
        return view('post.create_post_confirm',compact('post'));
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $post = $this->postInterface->postCreate($request);
        return redirect()->route('posts.index',compact('post'))
            ->with('success','Post Created Successfully');
    }

    //Display the specified resource.
    public function show($id)
    {
        
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $post = $this->postInterface->postEdit($id);
        return view('post.update_post',compact('post'));
    }

    //Show the confirm screen for editing the specified resource.
    public function updateConfirm(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $post = $this->postInterface->postUpdateConfirm($request);
        return view('post.update_post_confirm',compact('post'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $post = $this->postInterface->postUpdate($request, $id);
        return redirect()->route('posts.index')->with('success','Post updated Successfully');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $posts = $this->postInterface->postDelete($id);
        return redirect()->route('posts.index')->with('success','Post Deleted Successfully');
    }

    //Search the specified resource from storage.
    public function search(Request $request)
    {
        $posts = $this->postInterface->postSearch($request);
        return view('post.search',compact('posts'));
    }
}