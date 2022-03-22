<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jobber;
use App\Models\Post;

class JobberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'title' => 'Photographer at home',
                'ville' => 'Tetouan',
                'zone' => 'Center ville',
            ], [
                'title' => 'Car Wash',
                'ville' => 'Tetouan',
                'zone' => 'Martil',
            ], [
                'title' => 'Car Service',
                'ville' => 'Tetouan',
                'zone' => 'Fnidek',
            ], [
                'title' => 'Babysitter',
                'ville' => 'Tetouan',
                'zone' => 'center ville',
            ], [
                'title' => 'driver',
                'ville' => 'Tetouan',
                'zone' => 'Martil',
            ], [
                'title' => 'Teacher at home',
                'zone' => 'Tetouan',
                'ville' => 'Center ville',
            ],
        ];
        //user id is 2 that has author role
        $jobber = jobber::factory()->create([
            'jobber_category_id' => 1,
            'title' => 'Gabrato company',
            'photo' => 'images/logo/7.png',
        ]);
        foreach ($details as $index => $detail) {
            $post = Post::factory()->create([
                'jobber_id' => $jobber->id,
                'service_title' => $detail['title'],
                'service_ville' => $detail['ville'],
                'service_zone' => $detail['zone'],

            ]);
        }
    }
}
