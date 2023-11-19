<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $dataCategories = [
            [
                'sort' => 0,
                'icon' => 'fas fa-hand-point-up',
                'name' => 'Buff Bot' ,
                'display_name' => 'Facebook Bot' ,
                'slug' => 'facebook-bot',
                'content' => null,
                'visible' => 1,
                'type_category' => 'facebook',
                'identity_website' => config('license.domain'),
            ],
            [
                'sort' => 0,
                'icon' => 'fas fa-hand-point-up',
                'name' => 'Buff Facebook' ,
                'display_name' => 'Facebook Buff' ,
                'slug' => 'facebook-buff',
                'content' => null,
                'visible' => 1,
                'type_category' => 'facebook',
                'identity_website' => config('license.domain'),
            ],
            [
                'sort' => 0,
                'icon' => 'fas fa-hand-point-up',
                'name' => 'Facebook Vip' ,
                'display_name' => 'Facebook Vip' ,
                'slug' => 'facebook-vip',
                'content' => null,
                'visible' => 1,
                'type_category' => 'facebook',
                'identity_website' => config('license.domain'),
            ],
            [
                'sort' => 0,
                'icon' => 'fas fa-hand-point-up',
                'name' => 'Facebook Ad Break' ,
                'display_name' => 'Facebook Ad Break' ,
                'slug' => 'facebook-ad-break',
                'content' => null,
                'visible' => 1,
                'type_category' => 'facebook',
                'identity_website' => config('license.domain'),
            ]
        ];
        foreach ($dataCategories as $data) {
            Category::create($data);
        }

    }
}
