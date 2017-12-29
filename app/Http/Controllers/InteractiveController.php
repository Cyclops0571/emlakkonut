<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Numbering;
use App\Model\Parcel;
use Illuminate\Http\Request;

class InteractiveController extends Controller
{
    public function project(Request $request)
    {
        $this->validate($request, ['id'=>'exists:estate_project', 'interactiveJson' => 'required']);
        $project = EstateProject::find($request->get('id'));
        $project->setEstateProjectInteractivity($request->get('interactiveJson'));
        return \Response::json(['success' => true]);
    }

    public function parcel(Request $request)
    {
        $this->validate($request, ['id'=>'exists:parcel', 'interactiveJson' => 'required']);
        $parcel = Parcel::find($request->get('id'));
        $parcel->setInteractivity($request->get('interactiveJson'));
        return \Response::json(['success' => true]);
    }

    public function numbering(Request $request)
    {
        $this->validate($request, ['id'=>'exists:numbering', 'interactiveJson' => 'required']);
        $numbering = Numbering::find($request->get('id'));
        $numbering->setInteractivity($request->get('interactiveJson'));
        return \Response::json(['success' => true]);
    }
}
