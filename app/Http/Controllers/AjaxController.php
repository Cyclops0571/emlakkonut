<?php

namespace App\Http\Controllers;

use App\Model\Block;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function floorsOfBlock(Request $request)
    {
        $block = Block::find($request->get('blockId'));
        return $block->floors;
    }
}
