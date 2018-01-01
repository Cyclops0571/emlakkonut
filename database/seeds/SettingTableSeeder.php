<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\Setting::create([
            'name' => 'AdminPublicPath',
            'value' => ' ',
        ]);
        App\Model\Setting::create([
            'name' => 'AdminPublicUrl',
            'value' => ' ',
        ]);
        App\Model\Setting::create([
            'name' => 'ClientPublicUrl',
            'value' => ' ',
        ]);
    }
}
