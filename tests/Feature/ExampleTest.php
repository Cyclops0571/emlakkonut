<?php

namespace Tests\Feature;

use App\User;
use http\Url;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(\URL::route('projects'));
        $response->assertSee('PARK MAVERA');
    }

    public function testGenelVaziyetPlani() {
        $user = User::find(1);
        $response = $this->actingAs($user)->get(\URL::route('postures', 1));
        $response->assertSee('Genel Vaziyet Planı');
    }

    public function testMytest()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                -> assertSee('Latest Transactions');
        });
    }
}
