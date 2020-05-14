<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertSeeText('Laravel');
        $response->assertStatus(200);
    }
    public function testAboutPage()
    {
        $response = $this->get('/about');
        $response->assertSeeText('Go a Head You are Hero....!');
        $response->assertStatus(200);
    }
}
