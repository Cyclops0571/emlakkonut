<?php

namespace App\Console\Commands;

use App\Model\Block;
use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Floor;
use App\Model\FloorMapping;
use App\Model\Island;
use App\Model\Parcel;
use Illuminate\Console\Command;
use PhpParser\Error;

class KkysFloorCommand extends Command
{
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
        $apartments = EstateProjectApartment::groupBy(['project_id', 'Ada', 'Parsel', 'BlokNo', 'BulunduguKat'])
            ->get(['project_id', 'Ada', 'Parsel', 'BlokNo', 'BulunduguKat']);
        foreach ($apartments as $apartment) {
            $island = Island::getFromApartment($apartment);
            $parcel = Parcel::getFromApartment($apartment, $island);
            $block = Block::getFromApartment($apartment, $island, $parcel);

            if (!$island || !$parcel || !$block) {
                \Log::critical(static::class . " data conflict!!!");
                continue;
            }

            try {
                $floorNumbering = $apartment->BulunduguKat ? $apartment->BulunduguKat : 'Bulunduğu Kat Girilmemiş';
                $floor = Floor::where('project_id', $apartment->project_id)
                    ->where('island_id', $island->id)
                    ->where('parcel_id', $parcel->id)
                    ->where('block_id', $block->id)
                    ->where('floor_numbering', $floorNumbering)
                    ->first();
                if (!$floor) {
                    $floor = new Floor();
                }
                $floor->project_id = $apartment->project_id;
                $floor->island_id = $island->id;
                $floor->parcel_id = $parcel->id;
                $floor->block_id = $block->id;
                $floor->floor_no = FloorMapping::getFloorNo($floorNumbering);
                $floor->floor_numbering = $floorNumbering;
                $floor->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
                echo 'apartmentID: ' . $apartment->id;
                echo 'floorNumbering:' . $floorNumbering, PHP_EOL;
                echo 'floorMapping:' . FloorMapping::getFloorNo($floorNumbering), PHP_EOL;
            }
        }
    }
}
