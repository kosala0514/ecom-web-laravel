<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\ProductFacade;

class HomeController extends Controller
{
    public function index(){
        $response['items']=ProductFacade::allActive();
        return view('pages.home.index')->with($response);
    }
}
