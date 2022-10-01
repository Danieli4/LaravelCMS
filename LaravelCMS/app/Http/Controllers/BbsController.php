<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index(){
        return response("Новый контроллер")
            ->header("Content-Type", "text/plain");
    }
    //
}
