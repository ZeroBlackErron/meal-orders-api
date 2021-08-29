<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MealTest extends TestCase
{
    private $endpoint = '/api/meals';

    public function test_get_meals_paginated()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->getJson($this->endpoint);

        $response->assertOk()
            ->assertJsonStructure(
                ['data' => ['*' => ['id', 'name', 'description', 'currency', 'price',]], 'meta', 'links']
            );
    }
}
