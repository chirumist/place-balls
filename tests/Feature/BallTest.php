<?php
// tests/Feature/BallTest.php
use App\Models\Balls;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('a ball can be created', function () {
    $response = $this->post('/balls', [
        'name' => 'Blue',
        'color' => '#444544',
        'volume' => 10,
    ]);

    $response->assertRedirect('/balls');

    $this->assertDatabaseHas('balls', [
        'name' => 'Blue',
        'color' => '#444544',
        'volume' => 10,
    ]);
});

test('a ball can be updated', function () {
    $ball = Balls::factory()->create();

    $response = $this->put("/balls/{$ball->id}", [
        'name' => 'Blue',
        'color' => '#dddddd',
        'volume' => 15,
    ]);

    $response->assertRedirect('/balls');

    $this->assertDatabaseHas('balls', [
        'id' => $ball->id,
        'name' => 'Blue',
        'color' => '#dddddd',
        'volume' => 15,
    ]);
});

test('a ball can be deleted', function () {
    $ball = Balls::factory()->create();

    $response = $this->delete("/balls/{$ball->id}");

    $response->assertRedirect(session()->previousUrl());

    $this->assertDatabaseMissing('balls', [
        'id' => $ball->id,
    ]);

    $response->assertSessionHas('success', 'Ball has been deleted!');
});
