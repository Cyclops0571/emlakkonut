<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Floor;
use App\Model\Parcel;
use App\Model\Photo;
use GuzzleHttp\Psr7\UploadedFile;
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

    public function parcelStore(Request $request)
    {
        $this->validate($request, [
            'id'     => 'exists:parcel',
            'photo'  => 'mimes:jpeg,jpg|required|image']);

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

}
