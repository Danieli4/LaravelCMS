<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::orderBy('created_at', 'DESC')->paginate(3);
        //dd($post);
        //dump($post);

        return view("posts.index", [
            "posts"=>$post,
        ]);

    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', [
            "post"=>$post,
        ]);
    }
    //
}
