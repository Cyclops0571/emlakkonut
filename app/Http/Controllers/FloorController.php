<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(EstateProject $project)
    {
        $floors = $project->floor->sortBy('block_id');
        $floorsWithoutImage = [];
        $floorsWithImage = [];
        foreach ($floors as $floor) {
            if ($floor->floorPhoto) {
                $floorsWithImage[] = $floor;
            } else {
                $floorsWithoutImage[] = $floor;
            }
        }

        return view('floors', compact('project', 'floorsWithoutImage', 'floorsWithImage'));
    }
}
