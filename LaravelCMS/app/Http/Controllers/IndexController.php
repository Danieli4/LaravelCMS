<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $post = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        //dd($post);
        //dump($post);

        return view("welcome", [
            "posts"=>$post,
        ]);

    }

    //
}
