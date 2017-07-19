<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function saveProjectInteractive(Request $request)
    {
        $this->validate($request, ['id'=>'exists:estate_project', 'interactiveJson' => 'required']);
        $project = EstateProject::find($request->get('id'));
        $project->setEstateProjectInteractivity($request->get('interactiveJson'));
        return \Response::json(['success' => true]);
    }
}
