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
            'value' => 'C:\XAMPP\htdocs\online\emlakkonut\public',
        ]);
        App\Model\Setting::create([
            'name' => 'AdminPublicUrl',
            'value' => 'http://127.0.0.1:8001/',
        ]);
        App\Model\Setting::create([
            'name' => 'ClientPublicUrl',
            'value' => 'http://127.0.0.1:8000/',
        ]);
    }
}
