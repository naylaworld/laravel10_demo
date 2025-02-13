<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    // Set up the environment and models before running tests
    protected function setUp(): void
    {
        parent::setUp();

        // Seed the database with required data (users, categories, etc.)
        $this->artisan('migrate');

        // Create a test category and user for testing
        $this->category = Category::create([
            'name' => 'Personal',
        ]);
        
        $this->user = User::create([
            'name' => 'Admin',
            'email' => 'admin@tms.com',
            'password' => bcrypt('password'),
        ]);
    }

    /** @test */
    public function it_can_create_a_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Task - Yangon',
            'description' => 'Do something',
            'due_date' => '2025-02-13',
            'status' => 'pending',
            'category_id' => $this->category->id,
            'user_id' => $this->user->id,
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['id', 'title', 'description', 'due_date', 'status', 'category_id', 'user_id']);
    }

    /** @test */
    public function it_can_fetch_all_tasks()
    {
        // Create a task first
        Task::factory()->create([
            'title' => 'Task - Yangon',
            'description' => 'Do something',
            'due_date' => '2025-02-13',
            'status' => 'pending',
            'category_id' => $this->category->id,
            'user_id' => $this->user->id,
        ]);

        $response = $this->getJson('/api/tasks');
        $response->assertStatus(200);
        $response->assertJsonCount(1);  // Assure there is one task
    }

    /** @test */
    public function it_can_fetch_a_single_task()
    {
        // Create a task
        $task = Task::factory()->create([
            'title' => 'Task - Yangon',
            'description' => 'Do something',
            'due_date' => '2025-02-13',
            'status' => 'pending',
            'category_id' => $this->category->id,
            'user_id' => $this->user->id,
        ]);

        $response = $this->getJson("/api/tasks/{$task->id}");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Task - Yangon',
            'description' => 'Do something',
        ]);
    }

    /** @test */
    public function it_can_update_a_task()
    {
        // Create a task
        $task = Task::factory()->create([
            'title' => 'Task - Yangon',
            'description' => 'Do something',
            'due_date' => '2025-02-13',
            'status' => 'pending',
            'category_id' => $this->category->id,
            'user_id' => $this->user->id,
        ]);

        // Update the task
        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'Updated Task',
            'description' => 'Updated description',
            'due_date' => '2025-02-14',
            'status' => 'completed',
            'category_id' => $this->category->id,
            'user_id' => $this->user->id,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Updated Task',
            'description' => 'Updated description',
            'status' => 'completed',
        ]);
    }

    /** @test */
    public function it_can_delete_a_task()
    {
        // Create a task
        $task = Task::factory()->create([
            'title' => 'Task - Yangon',
            'description' => 'Do something',
            'due_date' => '2025-02-13',
            'status' => 'pending',
            'category_id' => $this->category->id,
            'user_id' => $this->user->id,
        ]);

        // Delete the task
        $response = $this->deleteJson("/api/tasks/{$task->id}");
        $response->assertStatus(204);

        // Check that the task no longer exists
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
