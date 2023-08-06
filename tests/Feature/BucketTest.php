<?php

// tests/Feature/BucketTest.php
use App\Models\Bucket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('a bucket can be created', function () {
    $response = $this->post('/buckets', [
        'name' => 'A',
        'total_volume' => 50,
    ]);

    $response->assertRedirect('/buckets');

    $this->assertDatabaseHas('buckets', [
        'name' => 'A',
        'total_volume' => 50,
        'empty_volume' => 0,
    ]);
});

test('a bucket can be updated', function () {
    $bucket = Bucket::factory()->create();

    $response = $this->put("/buckets/{$bucket->id}", [
        'name' => 'B',
        'total_volume' => 60,
    ]);

    $response->assertRedirect('/buckets');

    $this->assertDatabaseHas('buckets', [
        'id' => $bucket->id,
        'name' => 'B',
        'total_volume' => 60,
    ]);
});

test('a bucket can be deleted', function () {
    $bucket = Bucket::factory()->create();

    $response = $this->delete("/buckets/{$bucket->id}");

    $response->assertRedirect(session()->previousUrl());

    $this->assertDatabaseMissing('buckets', [
        'id' => $bucket->id,
    ]);

    $response->assertSessionHas('success', 'Bucket has been deleted!');
});
