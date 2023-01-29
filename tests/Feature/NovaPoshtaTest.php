<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NovaPoshtaTest extends TestCase
{
    public function test_gets_response_from_api()
    {
        $this->artisan('parse NovaPoshta')->assertSuccessful(200);
    }
}
