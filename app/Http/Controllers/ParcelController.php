<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    public function parcels(EstateProject $project)
    {
        return view('parcels', compact("project"));
    }

    public function toggleStatus(Parcel $parcel) {
        $parcel->status = ($parcel->status + 1) % 2;
        $parcel->save();
        return \Redirect::back();
    }
}
