<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test that api query return result of all products
     *
     * @return void
     */
    public function test_can_view_all_product(): void
    {
        $this
            ->call('GET', route('product.index'))
            ->assertStatus(200);
    }

    /**
     * Test that api query return error 404 when trying to view all products
     * when a wrong url is passed.
     *
     * @return void
     */
    public function test_can_not_view_all_product(): void
    {
        $this
            ->get(config('services.webservice.api-url') . '/lists')
            ->assertStatus(404);

    }

    /**
     * Test that api query return a specific product details
     *
     * @return void
     */
    public function test_can_view_specific_product(): void
    {
        $this
            ->call('GET', route('product.show', 'combgap'))
            ->assertStatus(200);
    }

    /**
     * Test that api query return error 404 when trying to view specific product details
     * when a wrong url is passed.
     *
     * @return void
     */
    public function test_can_not_view_specific_product(): void
    {
        $this
            ->get(config('services.webservice.api-url') . '/infoo', ['id' => 'smart'])
            ->assertStatus(404);

    }
}
