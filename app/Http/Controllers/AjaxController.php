<?php

namespace App\Http\Controllers;

use App\Model\Block;
use App\Model\Parcel;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function floorsOfBlock(Request $request)
    {
        $block = Block::find($request->get('blockId'));

        return $block->floors;
    }

    public function floorsOfParcel(Request $request)
    {
        $result = [];
        $parcel = Parcel::find($request->get('parcelId'));
        if (!$parcel) {
            return $result;
        }
        $tmp = array_unique($parcel->floors->pluck('floor_numbering')->toArray());
        foreach ($tmp as $floorName) {
            $result[] = $floorName;
        }

        return $result;
    }
}
