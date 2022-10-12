<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Bb;

class HomeController extends Controller
{
    // This constants is rules for validation users input
    private const BB_VALIDATOR = [
        'title' => 'required|max:50', // required to fill in, maximum length 50 symbols
        'content' => 'required',
        'price' => 'required|numeric' //  required to fill in, only numeric symbols
    ];

    private const BB_ERROR_MESSAGES =[
        'price.required' => 'Раздавать товары бесплатно нельзя',
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'numeric' => 'Тут должно быть число'
    ];

    /**
     * Create a new controller instance.
     * Displays the users home  page
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    /**
     * Displays the page for adding ads (Bb)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function showAddBbForm(){
        return view ('bb_add');
    }

    public function storeBb (Request $request){
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGES);
        Auth::user()->bbs()->create([
            'title'=> $validated['title'],
            'content'=> $validated['content'],
            'price'=> $validated['price']]);
        return redirect()->route('home');
    }

    public function showEditBbForm (Bb $bb){
        return view('bb_edit', ['bb'=>$bb]);
    }

    public function updateBb (Request $request, Bb $bb){
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGES);
        $bb->fill([
            'title'=> $validated['title'],
            'content'=> $validated['content'],
            'price'=> $validated['price']]);
        $bb->save();
        return redirect()->route('home');
    }

    public function showDeleteBbForm (Bb $bb){
        return view('bb_delete', ['bb'=>$bb]);
    }

    public function destroyBb (Bb $bb){
        $bb->delete();
        return redirect()->route('home');

    }

}
