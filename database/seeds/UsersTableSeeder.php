<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            return $this->_run_local();
        } elseif (App::environment('online')) {
            return $this->_run_online();
        }
    }

    private function _run_local()
    {
        App\User::create([
                'name' => 'admin',
                'password' => bcrypt('admin'),
                'KullaniciID' => 1,
                'Ad' => 'Tamim',
                'AdSoyad' => 'Maaz',
                'Soyad' => 'Maaz',
                'Unvan' => '',
                'KullaniciTur' => '',
        ]);
    }

    private function _run_online()
    {
        $this->_run_local();

        // Code for online
    }
}
