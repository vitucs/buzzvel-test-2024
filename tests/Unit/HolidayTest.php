<?php

namespace Tests\Unit;

use App\Models\Holiday;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HolidayTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_holiday()
    {
        $holidayData = [
            'title' => 'Christmas Holiday',
            'description' => 'Celebrate Christmas with family and friends.',
            'date' => '2023-12-25',
            'location' => 'New York',
            'participants' => ['Alice', 'Bob', 'Charlie'],
        ];

        $response = $this->postJson('/api/holidays', $holidayData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('holidays', ['title' => 'Christmas Holiday']);
    }

    public function test_read_holiday()
    {
        $holiday = Holiday::factory()->create();

        $response = $this->getJson("/api/holidays/{$holiday->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $holiday->id,
                     'title' => $holiday->title,
                     // other fields as needed
                 ]);
    }

    public function test_update_holiday()
    {
        $holiday = Holiday::factory()->create();

        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'date' => '2023-12-26',
            'location' => 'Los Angeles',
            'participants' => ['Alice', 'Bob'],
        ];

        $response = $this->putJson("/api/holidays/{$holiday->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('holidays', ['title' => 'Updated Title']);
    }

    public function test_delete_holiday()
    {
        $holiday = Holiday::factory()->create();

        $response = $this->deleteJson("/api/holidays/{$holiday->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('holidays', ['id' => $holiday->id]);
    }

    public function test_generate_pdf()
    {
        $holiday = Holiday::factory()->create();

        $response = $this->get("/api/holidays/{$holiday->id}/pdf");

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
