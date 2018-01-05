<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ServiceResponse;
use Illuminate\Http\Request;
use App\Model\ProjectVideosUrl;
use App\Model\Project360Url;

class HomeController extends Controller
{
    public function postures(Request $request, EstateProject $project)
    {
        EstateProject::setSession($project->id);
        $allUrls = ProjectVideosUrl::where('project_id', $project->id)->get();
        $v360Urls = Project360Url::where('project_id', $project->id)->get();
        return view('postures', compact('project', 'allUrls', 'v360Urls'));
    }

    public function index($view)
    {
        return view($view);
    }
}