<?php

namespace Database\Seeders;

use App\Models\ServicePack;
use Illuminate\Database\Seeder;

class ServicePackSeeder extends Seeder
{
    public function run(): void
    {
        $dataServicePack = [
            [
                'sort' => 0,
                'name' => 'Like bình luận',
                'slug' => 's_like',
                'display_name',
                'price_stock',
                'price_lv0',
                'price_lv1',
                'price_lv2',
                'price_lv3',
                'min_order',
                'max_order',
                'content',
                'instructional_video',
                'visible',
                'note_admin',
                'note',
                'info',
                'show_comment',
                'show_camxuc',
                'server',
                'service_id',
                'identity_website' => config('license.domain'),
            ]
        ];
        ServicePack::create();
    }
}
