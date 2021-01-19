<?php

namespace Tests\Feature;

use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PositionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_a_position()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/positions', [
            'name' => 'waiter'
        ]);

        $positions = Position::all();
        $position = Position::first();

        $this->assertCount(1, $positions);
        $this->assertEquals('Waiter', $position->name);
        $this->assertEquals('waiter', $position->slug);
        $response->assertRedirect(route('positions'));
    }

    /** @test */
    public function can_update_a_position()
    {
        $this->withoutExceptionHandling();

        $this->post('/positions', [
            'name' => 'waiter'
        ]);

        $position = Position::first();

        $response = $this->put('/positions/' . $position->slug, [
            'name' => 'waitress'
        ]);

        $updatedPosition = Position::first();

        $this->assertEquals('Waitress', $updatedPosition->name);
        $this->assertEquals('waitress', $updatedPosition->slug);
        $response->assertRedirect(route('positions', $updatedPosition->slug));
    }
}
