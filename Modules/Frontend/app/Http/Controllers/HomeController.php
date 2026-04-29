<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return view('frontend::home.index');
    }
    
    public function home1Op()
    {
        return view('frontend::home.home1Op');
    }

    public function home2Op()
    {
        return view('frontend::home.home2Op');
    }

    public function home3Op()
    {
        return view('frontend::home.home3Op');
    }

    public function home4Op()
    {
        return view('frontend::home.home4Op');
    }

    public function home5Op()
    {
        return view('frontend::home.home5Op');
    }

    public function home2()
    {
        return view('frontend::home.home2');
    }

    public function home3()
    {
        return view('frontend::home.home3');
    }

    public function home4()
    {
        return view('frontend::home.home4');
    }

    public function home5()
    {
        return view('frontend::home.home5');
    }   

    public function about()
    {
        return view('frontend::about');
    }

    public function contact()
    {
        return view('frontend::contact');
    }

}
