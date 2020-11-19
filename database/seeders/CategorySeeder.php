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
            'interior washing',
            'exterior washing', 'Exhaust',
            'Clutch ',
            'air conditioner',
            'mechanic', 'electrite', 'running gear adjustment', 'reservation guaranteed manufacturer preserved',
            'allumage gestion auteur', '
            diagnostic electronique
            electronic diagnosis', 'pneumatic', 'braking', 'shock absorber',

        ];
        foreach ($categories as $category) {
            DB::table('company_categories')->insert([
                'category_name' => $category
            ]);
        }
    }
}
