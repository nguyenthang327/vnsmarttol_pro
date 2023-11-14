<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $dataService = [
            [
                'sort' => 0,
                'name' => 'Tăng like bài viết (sale)',
                'display_name' => 'Tăng like bài viết (sale)',
                'slug' => Str::slug('like-post-sale'),
                'icon' => '',
                'content' => null,
                'visible' => 1,
                'category_id' => 1,
                'identity_website' => config('license.domain'),
            ],
            [
                'sort' => 0,
                'name' => 'Tăng like bài viết (speed)',
                'display_name' => 'Tăng like bài viết (speed)',
                'slug' => Str::slug('like-post-speed'),
                'icon' => '',
                'content' => null,
                'visible' => 1,
                'category_id' => 1,
                'identity_website' => config('license.domain'),
            ],
            [
                'sort' => 0,
                'name' => 'Tăng like bình luận',
                'display_name' => 'Tăng like bài viết (sale)',
                'slug' => Str::slug('like-comment'),
                'icon' => '',
                'content' => null,
                'visible' => 1,
                'category_id' => 1,
                'identity_website' => config('license.domain'),
            ]
        ];
        foreach ($dataService as $data) {
            Service::create($data);
        }

    }
}
