<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Parcel;
use Illuminate\Http\Request;

class DesignerController extends Controller {

    public function project(EstateProject $project)
    {
        if (!$project->projectPhoto)
        {
            return \Redirect::back()->withErrors('Proje imajını yüklemeden tasarımcıda işlem yapamazsınız.');
        }
        if (!$project->EstateProjectInteractivity)
        {
            $project->initEstateProjectInteractivity();
        }

        return view('designer.project', compact('project'));
    }

    public function parcel(Parcel $parcel)
    {
        if (!$parcel->parcelPhoto)
        {
            return \Redirect::back()->withErrors('Parsel imajını yüklemeden tasarımcıda işlem yapamazsınız.');
        }
        if (!$parcel->parcelInteractivity)
        {
            $parcel->initInteractivity();
        }

        return view('designer.parcel', compact('parcel'));
    }

    public function designer()
    {
        return view('designer');
    }
}
