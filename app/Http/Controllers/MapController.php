<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{

    public function location()
    {
        return view('location');
    }

    public function save(Request $request)
    {
        return $request->all();
    }
}
