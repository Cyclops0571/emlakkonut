<?php

namespace App\Http\Controllers;

use App\Model\Block;
use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Island;
use App\Model\Numbering;
use App\Model\Parcel;
use Illuminate\Http\Request;

class NumberingController extends Controller
{
    public function index(EstateProject $project)
    {
        return view('numbering.index', compact('project'));
    }

    public function create(EstateProject $project)
    {
        $islands = $project->islands;
        $parcels = $project->Parcels;
        $blocks = $project->blocks;

        return view('numbering.create', compact('project', 'islands', 'parcels', 'blocks'));
    }

    public function store(Request $request, \Response $response)
    {
        $projectId = $request->get('projectId', false);
        $islandId = $request->get('islandId', false);
        $parcelId = $request->get('parcelId', false);
        $blockId = $request->get('blockId', false);
        $apartmentIds = $request->get('apartments', false);

        $numbering = new Numbering();
        $numbering->name = $request->get('name');
        $numbering->project_id = EstateProject::getCurrentProjectIdFromSession();
        $numbering->save();
        $apartments = [];

        if ($apartmentIds) {
            // save all of the aprtments to numbering
            $apartments = EstateProjectApartment::whereIn('id', $apartmentIds)->get();
        } elseif ($blockId) {
            // save all of the apartments of the blockId to numbering
            $apartments = Block::find($blockId)->getApartments();
        } elseif ($parcelId) {
            // save all of the apartments of the parcelId to numbering
            $apartments = Parcel::find($parcelId)->getApartments();
        } elseif ($islandId) {
            // save all of the apartments of the islandId to numbering
            $apartments = Island::find($islandId)->getApartments();
        } elseif ($parcelId) {
            $apartments = EstateProjectApartment::where('project_id', $projectId)->get();
        }

        foreach ($apartments as $apartment) {
            $apartment->numbering_id = $numbering->id;
            $apartment->save();
        }

        return $response::redirectToRoute('numbering.index', $numbering->project_id);
    }

    public function edit(Numbering $numbering)
    {
        $project = EstateProject::getCurrentProjectFromSession();
        $islands = $project->islands;
        $parcels = $project->Parcels;
        $blocks = $project->blocks;
        return view('numbering.edit', compact('islands', 'parcels', 'blocks', 'numbering'));
    }

    public function toggleStatus(Numbering $numbering)
    {
        $numbering->status = ($numbering->status + 1) % 2;
        $numbering->save();

        return \Redirect::back();
    }

    public function delete(Numbering $numbering)
    {
        $numbering->delete();
        return \Redirect::back();
    }
}
