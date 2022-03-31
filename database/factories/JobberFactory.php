<?php

namespace Database\Factories;

use App\Models\Jobber;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jobber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2, //default author by user seeder class
            'jobber_category_id' => 1,
            'photo' => 'images/jobbers/logos/',
            'age'=> '120',
            'phone'=> '0667554899',
            'title' => 'Photographer at home',
            'description' => 'Tho',
            'facebook' => 'https://www.facebook.com',
            'cover_img' => 'nocover',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
