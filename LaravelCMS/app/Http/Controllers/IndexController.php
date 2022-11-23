<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Post;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;

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

    public function showContactForm()
    {
        return view("contact_form");
    }

    public function contactForm(ContactFormRequest $request)
    {
        Mail::to("daniel58912007  @gmail.com")->send(new ContactForm($request->validated()));

        return redirect(route("contacts"));

    }

    //
}
