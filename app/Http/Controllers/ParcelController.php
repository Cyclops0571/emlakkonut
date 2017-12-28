<?php

namespace App\Http\Controllers;

use App\Model\Block;
use App\Model\EstateProject;
use App\Model\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ParcelController extends Controller
{
    public function parcels(EstateProject $project)
    {
        return view('parcels', compact("project"));
    }

    public function toggleStatus(Parcel $parcel)
    {
        $parcel->status = ($parcel->status + 1) % 2;
        $parcel->save();

        return \Redirect::back();
    }
}
