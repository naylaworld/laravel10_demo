<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase; // Uses SQLite in-memory database for testing

    /**
     * Test creating a category.
     */
    public function test_can_create_category()
    {
        $data = ['name' => 'Work'];

        $response = $this->postJson('/api/categories', $data);

        $response->assertStatus(201)
                 ->assertJson(['name' => 'Work']);

        $this->assertDatabaseHas('categories', $data);
    }

    /**
     * Test fetching all categories.
     */
    public function test_can_fetch_all_categories()
    {
        Category::factory()->count(3)->create();

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id', 'name']
                 ]);
    }

    /**
     * Test fetching a single category.
     */
    public function test_can_fetch_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
                 ->assertJson(['id' => $category->id, 'name' => $category->name]);
    }

    /**
     * Test updating a category.
     */
    public function test_can_update_category()
    {
        $category = Category::factory()->create();
        $updatedData = ['name' => 'Updated Category'];

        $response = $this->putJson("/api/categories/{$category->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJson(['name' => 'Updated Category']);

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Updated Category']);
    }

    /**
     * Test deleting a category.
     */
    public function test_can_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
