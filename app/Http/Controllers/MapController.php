<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{

    public function save(Request $request)
    {
        return $request->all();
    }
}
