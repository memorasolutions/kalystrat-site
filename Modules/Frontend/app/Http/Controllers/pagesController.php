<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends \App\Http\Controllers\Controller
{
    public function cart()
    {
        return view('frontend::pages.cart');
    }

    public function checkout()
    {
        return view('frontend::pages.checkout');
    }

    public function project()
    {
        return view('frontend::pages.project');
    }

    public function projectDetails()
    {
        return view('frontend::pages.projectDetails');
    }

    public function shop()
    {
        return view('frontend::pages.shop');
    }

    public function shopDetails()      
    {
        return view('frontend::pages.shopDetails');
    }

    public function team()      
    {
        return view('frontend::pages.team');
    }

    public function teamDetails()
    {
        return view('frontend::pages.teamDetails');
    }

    public function wishlist()    
    {
        return view('frontend::pages.wishlist');
    }

}
