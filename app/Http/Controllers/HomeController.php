<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tenancy\Facades\Tenancy;
use Tenancy\Identification\Contracts\Tenant;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
