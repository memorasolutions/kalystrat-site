<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends \App\Http\Controllers\Controller
{
    public function blog()
    {
        return view('frontend::news.blog');
    }

    public function blogDetails()
    {
        return view('frontend::news.blogDetails');
    }
}
