<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Car Wash',
            'Car Service', 'Meal delivery',
            'Maid ',
            'Handyman',
            'Chef service', 'Coaching', 'Aesthetic', 'Hairdresser',
            'Baby sitter',
            'Driver', 'Moving house', 'support class teacher',

        ];
        foreach ($categories as $category) {
            DB::table('jobber_categories')->insert([
                'category_name' => $category
            ]);
        }
    }
}
