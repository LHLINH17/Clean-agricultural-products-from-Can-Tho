<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUserController extends Controller
{
    public function about()
    {
        return view('about',[
            'title' => 'About'
        ]);
    }
}
