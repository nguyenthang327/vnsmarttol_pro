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
                'name' => 'ServicePack 01',
                'display_name' => 'ServicePack 01',
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
                'reaction',
                'code_server',
                'type_server',
                'api_server',
                'status_server',
                'service_id' ,
                'identity_website',
                'identity_website' => config('license.domain'),
            ]
        ];
        ServicePack::create();
    }
}
