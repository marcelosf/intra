<?php

namespace Intranet\Http\Controllers\Api;

use Intranet\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {

        return view('home.index');

    }

}
