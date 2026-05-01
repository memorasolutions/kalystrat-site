<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends \App\Http\Controllers\Controller
{
    public function service()
    {
        return view('frontend::service.service', [
            'title' => 'Nos services',
            'metaDescription' => "Découvrez les 6 filiales de Kalystrat à Québec : fondations, structure, toiture, finition, immobilier et placement. Intégration verticale 100 % québécoise.",
            'ogTitle' => "Services Kalystrat : 6 filiales construction au Québec",
        ]);
    }
    public function serviceDetails()      
    {
        return view('frontend::service.serviceDetails');
    }
}