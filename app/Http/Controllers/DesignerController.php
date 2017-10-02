<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Floor;
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

        $project = EstateProject::getCurrentProjectFromSession();

        return view('designer.parcel', compact('parcel', 'project'));
    }

    public function designer()
    {
        return view('designer');
    }

    public function floor(Floor $floor)
    {
        if (!$floor->floorPhoto)
        {
            return \Redirect::back()->withErrors('Kat imajını yüklemeden tasarımcıda işlem yapamazsınız.');
        }
        if (!$floor->floorInteractivity)
        {
            $floor->initInteractivity();
        }

        return view('designer.floor', compact('floor'));
    }
}
