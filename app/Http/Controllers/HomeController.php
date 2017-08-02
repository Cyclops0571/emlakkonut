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
        return view('parcels', compact("project"));
    }

    public function floors(EstateProject $project)
    {
        $floors = $project->floor->sortBy('block_id');
        $floorsWithoutImage = [];
        $floorsWithImage = [];
        foreach ($floors as $floor) {
            if($floor->floorPhoto) {
                $floorsWithImage[] = $floor;
            } else {
                $floorsWithoutImage[] = $floor;
            }
        }
        return view('floors', compact('project','floorsWithoutImage', 'floorsWithImage'));
    }

    public function apartments()
    {
        return view('apartments');
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