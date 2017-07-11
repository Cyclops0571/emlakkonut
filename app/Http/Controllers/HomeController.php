<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        return view('projects');
    }

    public function postures()
    {
        return view('postures');
    }

    public function parcels()
    {
        return view('parcels');
    }

    public function floors()
    {
        return view('floors');
    }

    public function apartments()
    {
        return view('apartments');
    }

    public function location()
    {
        return view('location');
    }

    public function designer()
    {
        return view('designer');
    }

    public function index($view)
    {
        return view($view);
    }
}