<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Floor;
use App\Model\Parcel;
use Illuminate\Http\Request;
use View;

class PhotoController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id' => 'exists:estate_project', 'photo' => 'mimes:jpeg|required|image']);
        $project = EstateProject::find($request->get('id'));
        $project->createPhoto($request->file('photo'));

        return redirect()->back()->with('success', 'Fotoğrafınız Kaydedildi');
    }

    public function parcelStore(Request $request, EstateProject $project)
    {
        $this->validate($request, ['photo'  => 'required|mimes:jpg,jpeg|image']);

        
        $parcel = Parcel::create([
            'project_id' => $project->id,
            'island_id' => 1,	
            'parcel' => 'n',
            'status' => 1,
        ]);

        $parcel->setParcelPhoto($request->file('photo'));

        return redirect()->back()->with('success', 'Fotoğrafınız Kaydedildi');
    }

    public function numberingStore(Request $request)
    { //todo 571571
        $this->validate($request, ['id' => 'exists:parcel', 'photo'  => 'mimes:jpeg,jpg|required|image']);

        $parcel = Parcel::find($request->get('id'));
        $parcel->setParcelPhoto($request->file('photo'));

        return redirect()->back()->with('success', 'Fotoğrafınız Kaydedildi');
    }

    public function floorStore(Request $request, EstateProject $project)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg|image'
        ]);

        Floor::setFloorPhoto($project, $request->file('photo'));

        //return floorsWithPhoto and floorsWithoutPhoto
        return [];

    }

    public function apartmentStore(Request $request)
    {
        $project = EstateProject::getCurrentProjectFromSession();
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg|image'
        ]);

        EstateProjectApartment::setFloorPhoto($project, $request->file('photo'));

        //return floorsWithPhoto and floorsWithoutPhoto
        return [];

    }

}
