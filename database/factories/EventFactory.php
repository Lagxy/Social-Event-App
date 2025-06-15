<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
        'image_path' => 'assets/images/event1.jpg',
        'title' => $this->faker->sentence,
        'description' => $this->faker->paragraph,
        'location' => $this->faker->city,
        'date' => $this->faker->date,
        'time' => $this->faker->time,
        'status' => 'pending',
        'user_id' => 1, // Or use User::factory() if you want dynamic users
    ];
    }
}
