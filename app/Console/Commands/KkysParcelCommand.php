<?php

namespace App\Console\Commands;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Island;
use App\Model\Parcel;
use Illuminate\Console\Command;
use phpDocumentor\Reflection\Project;

class KkysParcelCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys:parcel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and insert parcels';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $apartments = EstateProjectApartment::groupBy(['project_id', 'Ada', 'Parsel'])->get(['project_id', 'Ada', 'Parsel']);
        foreach ($apartments as $apartment)
        {
            $island = Island::getFromApartment($apartment);
            if(!$island) {
                \Log::critical(static::class . " data conflict!!!");
                continue;
            }

            $parcel = Parcel::getFromApartment($apartment, $island);
            if (!$parcel)
            {
                $parcel = new Parcel();
                $parcel->project_id = $apartment->project_id;
                $parcel->island_id = $island->id;
                $parcel->parcel = $apartment->Parsel;
                $parcel->save();
            }
        }
    }
}
