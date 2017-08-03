<?php

namespace App\Console\Commands;

use App\Model\Block;
use App\Model\EstateProjectApartment;
use App\Model\Island;
use App\Model\Parcel;
use Illuminate\Console\Command;

class KkysBlockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys:block';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and insert block';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $apartments = EstateProjectApartment::groupBy(['project_id', 'Ada', 'Parsel', 'BlokNo'])->get(['project_id', 'Ada', 'Parsel', 'BlokNo']);
        foreach ($apartments as $apartment)
        {
            $island = Island::getFromApartment($apartment);
            $parcel = Parcel::getFromApartment($apartment, $island);
            if (!$island || !$parcel)
            {
                \Log::critical(static::class . " data conflict!!!");
                continue;
            }

            $block = Block::getFromApartment($apartment, $island, $parcel);
            if (!$block)
            {
                $block = new Block();
            }
            $block->project_id = $apartment->project_id;
            $block->island_id = $island->id;
            $block->parcel_id = $parcel->id;
            $block->block_no = $apartment->BlokNo;
            $block->save();
        }
    }
}
