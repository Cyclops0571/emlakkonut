<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Parcel;
use App\Model\ProjectLocation;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function location()
    {
        $projectId = EstateProject::getCurrentProjectIdFromSession();
        return view('location', compact('projectId'));
    }

    public function save(Request $request)
    {
        $file = $request->file('image');
        dump($request->get('image'));
        dd($file);
        $image = \Image::make($file->getRealPath());
        $image->widen(50);
        $image->save(public_path('deneme.jpg'));
        return [];
        $projectId = EstateProject::getCurrentProjectIdFromSession();
        $projectLocation = ProjectLocation::getByProjectID($projectId);
        $projectLocation->map_data = $request->get('positions', '');
        $projectLocation->save();

        $parcel = new Parcel();
        $file = $request->file('image');
        $image = \Image::make($file->getRealPath());
        $image->widen(50);
        $image->save(public_path('deneme.jpg'));

        dump($request->get('positions'));
        dump($request->get('image'));
        return $request->all();
    }
}
