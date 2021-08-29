<?php

namespace Tests\Feature;

use App\Models\Meal;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class OrderTest extends TestCase
{
    private $endpoint = '/api/orders';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_order()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $meals = Meal::factory(3)->create();

        $mealIds = $meals->map(function ($meal) {
            return ['id' => $meal->id];
        });

        $payload = [
            'meals' => $mealIds,
        ];

        $response = $this->postJson($this->endpoint, $payload);

        $response->assertCreated()
            ->assertJsonStructure(
                [
                    'order' => [
                        'id',
                        'code',
                        'amount',
                        'customer_name',
                        'customer_email',
                        'meal_orders' => ['*' => ['id', 'name', 'description', 'currency', 'price']],
                    ]
                ]
            );
    }
}
