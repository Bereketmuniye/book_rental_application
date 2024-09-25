<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Fiction', 'Non-Fiction', 'Science', 'History', 'Biography'];
        foreach ($categories as $category) {
            DB::table('categories')->insert(['name' => $category]);
        }
    }
}
