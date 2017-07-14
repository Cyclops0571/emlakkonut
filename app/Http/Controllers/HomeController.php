<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ServiceResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        $projects = \Auth::user()->estateProject;
        return view('projects', compact('projects'));
    }

    public function postures(Request $request, EstateProject $project)
    {

        $request->session()->put('projectID', $project->id);
        return view('postures', compact('project'));
    }

    public function parcels(EstateProject $project)
    {
        return view('parcels', compact($project));
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

    public function projectDesigner(EstateProject $project)
    {
        return view('project.designer', compact('project'));
    }

    public function index($view)
    {
        return view($view);
    }
}
