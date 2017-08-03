<?php

namespace App\Console\Commands;

use App\Model\EstateProjectApartment;
use Illuminate\Console\Command;

class KkysFloorMappingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kkys:floormapping';

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
        $apartments = EstateProjectApartment::groupBy('BulunduguKat')->get(['BulunduguKat']);
        foreach($apartments as $apartment) {
            echo $apartment->BulunduguKat, PHP_EOL;
        }
    }
}
