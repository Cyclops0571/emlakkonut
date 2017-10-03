<?php

namespace App\Console\Commands;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Island;
use Illuminate\Console\Command;

class KkysIslandCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys:island';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $apartments = EstateProjectApartment::groupBy(['project_id', 'Ada'])->get(['project_id', 'Ada']);
        foreach ($apartments as $apartment) {
            $island = Island::getFromApartment($apartment);
            if (!$island && $apartment->Ada) {
                $island = new Island();
                $island->project_id = $apartment->project_id;
                $island->island_kkys = $apartment->Ada;
                $island->save();
            }
        }
    }
}
