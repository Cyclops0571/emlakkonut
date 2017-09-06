<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
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

    public function toogleStatus(EstateProject $project) {
        $project->status = ($project->status + 1) % 2;
        $project->save();
        return \Redirect::route('projects');
    }

}
