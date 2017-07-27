<?php

namespace App\Console\Commands;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Parcel;
use Illuminate\Console\Command;
use phpDocumentor\Reflection\Project;

class KkysParcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys-parcel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and insert parcels';

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
        $parcels = EstateProjectApartment::groupBy(['ProjeID', 'Parsel'])->get(['ProjeID', 'Parsel']);
        foreach($parcels as $parcel) {
            $project = EstateProject::where('ProjeID', $parcel->ProjeID)->first();
            if(!$project) {
                continue;
            }
            $oldParcel = Parcel::where('project_id', $project->id)->where('parcel')->first();
            if(!$oldParcel) {
                $newParcel = new Parcel();
                $newParcel->project_id = $project->id;
                $newParcel->parcel = $parcel->Parsel;
                $newParcel->save();
            }
        }
    }
}
