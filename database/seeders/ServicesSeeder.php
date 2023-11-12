<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'sort' => 0,
            'name' => 'Facebook Buff',
            'slug' => null,
            'icon' => 'fas fa-hand-point-up',
            'content' => null,
            'visible' => 1,
            'category_id' => 1,
            'identity_website' => config('license.domain'),
        ]);
    }
}
