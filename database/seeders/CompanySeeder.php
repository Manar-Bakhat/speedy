<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Post;

class CompanySeeder extends Seeder
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
                'title' => 'Php laravel developer',
                'ville' => 'full time',
                'zone' => 'bachelors',
            ], [
                'title' => 'Marketing Expert',
                'ville' => 'full time',
                'zone' => 'bachelors',
            ], [
                'title' => 'Professional designer',
                'ville' => 'Part time',
                'zone' => 'bachelors',
            ], [
                'title' => 'Dotnet programmer',
                'ville' => 'full time',
                'zone' => 'high school',
            ], [
                'title' => 'Sales Executive',
                'ville' => 'Part time',
                'zone' => 'bachelors',
            ], [
                'title' => 'Maths Teacher',
                'zone' => 'full time',
                'ville' => 'master',
            ],
        ];
        //user id is 2 that has author role
        $company = Company::factory()->create([
            'company_category_id' => 1,
            'title' => 'Gabrato company',
            'logo' => 'images/logo/7.png',
        ]);
        foreach ($details as $index => $detail) {
            $post = Post::factory()->create([
                'company_id' => $company->id,
                'service_title' => $detail['title'],
                'service_ville' => $detail['ville'],
                'service_zone' => $detail['zone'],

            ]);
        }
    }
}
