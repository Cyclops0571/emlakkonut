<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Floor;
use App\Model\Numbering;
use App\Model\Parcel;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function project(EstateProject $project)
    {
        if (!$project->projectPhoto) {
            return \Redirect::back()->withErrors('Proje imajını yüklemeden tasarımcıda işlem yapamazsınız.');
        }
        if (!$project->EstateProjectInteractivity) {
            $project->initEstateProjectInteractivity();
        }

        return view('designer.project', compact('project'));
    }

    public function numbering(Numbering $numbering)
    {
        if (!$numbering->numberingPhoto) {
            return \Redirect::back()->withErrors('Numaratör imajını yüklemeden tasarımcıda işlem yapamazsınız.');
        }

        if (!$numbering->numberingInteractivity) {
            $numbering->initInteractivity();
        }

        $project = EstateProject::getCurrentProjectFromSession();
        $apartments = $numbering->apartments->sortBy(function ($apartment) {
            return $apartment->BlokNo . '_' . strlen($apartment->KapiNo) . '_' . $apartment->KapiNo;
        });

        $apartmentUrls = [];
        foreach ($apartments as $apartment) {
            $apartmentUrls[$apartment->id] = $apartment->url();
        }

        return view('designer.numbering', compact('numbering', 'project', 'apartments', 'apartmentUrls'));
    }

    public function designer()
    {
        return view('designer');
    }

    public function floor(Floor $floor)
    {
        if (!$floor->floorPhoto) {
            return \Redirect::back()->withErrors('Kat imajını yüklemeden tasarımcıda işlem yapamazsınız.');
        }
        if (!$floor->floorInteractivity) {
            $floor->initInteractivity();
        }

        return view('designer.floor', compact('floor'));
    }
}
