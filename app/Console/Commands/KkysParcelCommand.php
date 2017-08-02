<?php

namespace App\Console\Commands;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
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
        $parcels = EstateProjectApartment::groupBy(['project_id', 'Parsel'])->get(['project_id', 'Parsel']);
        foreach ($parcels as $parcel)
        {
            $project = EstateProject::where('id', $parcel->project_id)->first();
            if (!$project)
            {
                continue;
            }
            $oldParcel = Parcel::where('project_id', $project->id)->where('parcel')->first();
            if (!$oldParcel)
            {
                $newParcel = new Parcel();
                $newParcel->project_id = $project->id;
                $newParcel->parcel = $parcel->Parsel;
                $newParcel->save();
            }
        }
    }
}
