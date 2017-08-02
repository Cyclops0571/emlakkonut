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
        $username = 'm_y';
        $password = '23we';

        $serviceResponse = ServiceResponse::setUserAttributesFromService($username, $password);
        $user = User::setAttributesFromService($serviceResponse->Sonuc);
        $projectList = $user->setProjectListFromService();
        foreach ($projectList as $project)
        {
            $user->setProjectPartsFromService($project->ProjeID);
        }
    }
}
