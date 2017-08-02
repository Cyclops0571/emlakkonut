<?php

namespace App\Console\Commands;

use App\Model\Block;
use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Floor;
use App\Model\Parcel;
use Illuminate\Console\Command;

class KkysFloorCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys:floor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and insert floors';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $floors = EstateProjectApartment::groupBy(['project_id', 'Parsel', 'BlokNo', 'BulunduguKat'])->get(['project_id', 'Parsel', 'BlokNo', 'BulunduguKat']);
        foreach ($floors as $floorData)
        {
            $parcel = Parcel::where('project_id', $floorData->project_id)
                ->where('parcel', $floorData->Parsel)
                ->first();
            $block = Block::where('project_id', $floorData->project_id)
                ->where('parcel_id', $parcel->id)
                ->where('block_no', $floorData->BlokNo)
                ->first();
            if (!$parcel || !$block)
            {
                continue;
            }



            $floorNumbering = $floorData->BulunduguKat ? $floorData->BulunduguKat : 'Bulunduğu Kat Girilmemiş';
            $floor = Floor::where('project_id', $floorData->project_id)
                ->where('parcel_id', $parcel->id)
                ->where('block_id', $block->id)
                ->where('floor_numbering', $floorNumbering)
                ->first();
            if (!$floor)
            {
                $floor = new Floor();
            }
            $floor->project_id = $floorData->project_id;
            $floor->parcel_id = $parcel->id;
            $floor->block_id = $block->id;
            $floor->floor_numbering = $floorNumbering;
            $floor->save();
        }
    }
}
