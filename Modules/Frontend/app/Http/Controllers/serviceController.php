<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends \App\Http\Controllers\Controller
{
    public function service()      
    {
        return view('frontend::service.service');
    }
    public function serviceDetails()      
    {
        return view('frontend::service.serviceDetails');
    }
}