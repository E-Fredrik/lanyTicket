<?php

use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('saves a valid registration', function () {
    $response = $this->post(route('registrations.store'), [
        'ticket_type' => 'premium',
        'quantity' => 2,
        'full_name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'updates' => 'yes',
    ]);

    $response->assertRedirect(route('home'));
    $this->assertDatabaseHas('registrations', [
        'ticket_type' => 'premium',
        'quantity' => 2,
        'full_name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'updates' => true,
    ]);
});

it('stores updates as false when unchecked', function () {
    $this->post(route('registrations.store'), [
        'ticket_type' => 'standard',
        'quantity' => 1,
        'full_name' => 'Grace Hopper',
        'email' => 'grace@example.com',
    ]);

    expect(Registration::first()->updates)->toBeFalse();
});

it('rejects invalid input', function (array $data, string $field) {
    $this->post(route('registrations.store'), $data)
        ->assertSessionHasErrors($field);

    expect(Registration::count())->toBe(0);
})->with([
    'unknown ticket' => [['ticket_type' => 'vip', 'quantity' => 1, 'full_name' => 'A', 'email' => 'a@example.com'], 'ticket_type'],
    'quantity too high' => [['ticket_type' => 'standard', 'quantity' => 5, 'full_name' => 'A', 'email' => 'a@example.com'], 'quantity'],
    'bad email' => [['ticket_type' => 'standard', 'quantity' => 1, 'full_name' => 'A', 'email' => 'nope'], 'email'],
    'missing name' => [['ticket_type' => 'standard', 'quantity' => 1, 'email' => 'a@example.com'], 'full_name'],
]);
