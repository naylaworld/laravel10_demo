<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'due_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'category_id' => \App\Models\Category::factory(), // Creates a related category
            'user_id' => \App\Models\User::factory(), // Creates a related user
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
