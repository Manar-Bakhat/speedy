<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_title' => 'Car Wash',
            'service_ville' => 'Tetouan',
            'service_zone' => 'Martil',
            'deadline' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +2 days")),
            'service_specification' => '<p></p>',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
