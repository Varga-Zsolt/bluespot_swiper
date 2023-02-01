<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SwipeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        User::factory(10)->create();
    }

    public function test_swipe_endpoint_returns_201_created()
    {
        $response = $this->postJson(
            '/api/swipe',
            [
                "user_id" => 2,
                "swiped_user_id" => 1,
                "action" => "like"
            ]
        );

        $response->assertStatus(201);
    }

    public function test_swipe_record_inserted_into_database()
    {
        $swipeData = [
            "user_id" => 2,
            "swiped_user_id" => 1,
            "action" => "like"
        ];

        $this->postJson(
            '/api/swipe',
            $swipeData
        );

        $this->assertDatabaseHas('swipes', $swipeData);
    }

    public function test_swipe_record_already_exists_in_database()
    {
        $swipeData = [
            "user_id" => 2,
            "swiped_user_id" => 1,
            "action" => "like"
        ];

        $this->postJson(
            '/api/swipe',
            $swipeData
        );

        $response = $this->postJson(
            '/api/swipe',
            $swipeData
        );

        $response->assertStatus(422);
    }
}
