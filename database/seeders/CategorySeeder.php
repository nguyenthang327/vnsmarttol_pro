<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'sort' => 0,
            'icon' => 'fab fa-facebook-square',
            'name' => 'Facebook' ,
            'slug' => 'facebook',
            'content' => null,
            'visible' => 1,
            'identity_website' => config('license.domain'),
        ]);
    }
}
