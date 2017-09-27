<?php

namespace App\Console\Commands;

use App\Model\ServiceResponse;
use App\User;
use Illuminate\Console\Command;

class KkysDataCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Kkys Data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username = config('app.kkysUser');
        $password = config('app.kkysPassword');

        $serviceUser = ServiceResponse::getServiceUser($username, $password);
        $user = User::setAttributesFromService($serviceUser->Sonuc);
        $projectList = $user->setProjectListFromService();
        dump($projectList);
        foreach ($projectList as $project)
        {
            $user->setProjectPartsFromService($project->ProjeID);
        }

        \Artisan::call('kkys:island');
        \Artisan::call('kkys:parcel');
        \Artisan::call('kkys:block');
        \Artisan::call('kkys:floor');
        \Artisan::call('kkys:floormapping');

    }
}
