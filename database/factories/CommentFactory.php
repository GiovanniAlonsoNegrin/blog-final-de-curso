<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'message' => $this->faker->text(50),
           'status' => $this->faker->randomElement([1, 2]),
           'user_id' => User::all()->random()->id,
           'post_id' => Post::all()->random()->id,
        ];
    }
}
