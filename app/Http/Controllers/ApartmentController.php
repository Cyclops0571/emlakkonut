<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    public function index(EstateProject $project)
    {
        $apartments = EstateProjectApartment::where('project_id', $project->id)->get();

        return view('apartments', compact('apartments', 'project'));
    }
}
