<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ServiceResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function postures(Request $request, EstateProject $project)
    {
        EstateProject::setSession($project->id);
        return view('postures', compact('project'));
    }

    public function parcels(EstateProject $project)
    {
        return view('parcels', compact("project"));
    }


    public function location()
    {
        return view('location');
    }

    public function index($view)
    {
        return view($view);
    }
}