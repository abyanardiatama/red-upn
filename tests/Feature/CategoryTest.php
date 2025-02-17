<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index route.
     */
    //login as admin
    public function loginAsAdmin()
    {
        $this->post('/login', [
            'email' => 'red@mail.com',
            'password' => 'password'
        ]);
    }
    public function test_index_route()
    {
        $this->loginAsAdmin();
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }
    /**
     * Test the store route.
     */
    public function test_store_route()
    {
        $this->loginAsAdmin();
        $response = $this->post('/dashboard/categories', [
            'name' => 'Category 1',
        ]); //create a new category
        $response->assertRedirect('/dashboard/categories');
        $this->assertDatabaseHas('categories', [
            'name' => 'Category 1',
        ]);
    }
        /**
         * Test the update route.
         */
        public function test_update_route()
        {
            $this->loginAsAdmin();
            $category = \App\Models\Category::factory()->create(); //create a new category
            $response = $this->patch('/dashboard/categories/' . $category->id, [
                'name' => 'Category 2',
            ]);
            $response->assertRedirect('/dashboard/categories');
            $this->assertDatabaseHas('categories', [
                'name' => 'Category 2',
            ]);
            }
            /**
             * Test the destroy route.
             */
            public function test_destroy_route()
            {
                $this->loginAsAdmin();
                $category = \App\Models\Category::factory()->create(); //create a new category
                $response = $this->delete('/dashboard/categories/' . $category->id);
                $response->assertRedirect('/dashboard/categories');
                $this->assertDatabaseMissing('categories', [
                    'name' => $category->name,
                ]);
            }
}
