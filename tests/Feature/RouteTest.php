<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);
beforeEach(fn () => User::factory()->create());

it('has users')->assertDatabaseHas('users', [
    'id' => 1,
]);

it('show products page', function () {
        get('/')
        ->assertViewIs('product.product-list')
        ->assertSee('Insurance Products')
        ->assertStatus(200);

});

it('shows the list of products available', function () {
    get('/products')
        ->assertOk()
        ->assertStatus(200);

});

