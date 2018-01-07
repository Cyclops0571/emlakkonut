<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(EstateProject $project)
    {
        /** @var EstateProjectApartment[] $apartments */
        $apartments = $project->apartments->sortBy(function ($apartment) {
            return $apartment->BlokNo . '_' . strlen($apartment->KapiNo) . '_' .  $apartment->KapiNo;
        });
        $apartmentsWithImage = [];
        $apartmentsWithoutImage = [];
        foreach ($apartments as $apartment) {
            if ($apartment->photo) {
                $apartmentsWithImage[] = $apartment;
            } else {
                $apartmentsWithoutImage[] = $apartment;
            }
        }

        return view('apartments', compact('project', 'apartmentsWithImage', 'apartmentsWithoutImage'));
    }
}
