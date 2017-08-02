<?php

namespace App\Console\Commands;

use App\Model\Block;
use App\Model\EstateProjectApartment;
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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $blocks = EstateProjectApartment::groupBy(['project_id', 'Parsel', 'BlokNo'])->get(['project_id', 'Parsel', 'BlokNo']);
        foreach ($blocks as $blockData)
        {
            $parcel = Parcel::where('project_id', $blockData->project_id)
                ->where('parcel', $blockData->Parsel)
                ->first();
            if (!$parcel)
            {
                continue;
            }

            $block = Block::where('project_id', $blockData->project_id)
                ->where('parcel_id', $parcel->id)
                ->where('block_no', $blockData->BlokNo)
                ->first();
            if (!$block)
            {
                $block = new Block();
            }
            $block->project_id = $blockData->project_id;
            $block->parcel_id = $parcel->id;
            $block->block_no = $blockData->BlokNo;
            $block->save();
        }
    }
}
