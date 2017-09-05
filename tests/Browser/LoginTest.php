<?php

namespace Tests\Browser;

use App\User;
use http\Url;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('name', 'm_y')
                ->type('password', '23we')
                ->press('Giriş')
                ->assertPathIs('/projects');
        });
    }

//    public function testParcel() {
//        $this->browse(function (Browser $browser) {
//
//            $browser->loginAs(User::find(1))
//                ->visit(\URL::route('projects'))
//                ->assertSee('EMLAK KONUT PELİKAN SİTESİ');
//        });
//    }
}
