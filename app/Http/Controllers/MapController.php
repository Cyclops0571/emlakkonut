<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function location()
    {
        $projectId = EstateProject::getCurrentProjectIdFromSession();
        return view('location', compact('projectId'));
    }

    public function save(Request $request)
    {
        return $request->all();
    }
}
