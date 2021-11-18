<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductSearchControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tntsearch()
    {
        $response = $this->getJson(route("productSearch", ['query' => 'odio']));

        $response->assertStatus(200)
            ->dump();
    }
}
