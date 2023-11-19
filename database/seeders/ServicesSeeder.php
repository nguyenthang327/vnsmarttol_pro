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
                'name' => 'Tăng like bài viết (sale)',
                'display_name' => 'Tăng like bài viết (sale)',
                'slug' => Str::slug('like-post-sale')
            ],
            [
                'name' => 'Tăng like bài viết (speed)',
                'display_name' => 'Tăng like bài viết (speed)',
                'slug' => Str::slug('like-post-speed'),
            ],
            [
                'name' => 'Tăng like bình luận',
                'display_name' => 'Tăng like bình luận',
                'slug' => Str::slug('like-comment')
            ],
            [
                'name' => 'Tăng bình luận (sale)',
                'display_name' => 'Tăng bình luận (sale)',
                'slug' => Str::slug('comment-sale')
            ],
            [
                'name' => 'Tăng bình luận (speed)',
                'display_name' => 'Tăng bình luận (speed)',
                'slug' => Str::slug('comment-speed'),
            ],
            [
                'name' => 'Tăng sub/follow (vip)',
                'display_name' => 'Tăng sub/follow (vip)',
                'slug' => Str::slug('sub-vip'),
            ],
            [
                'name' => 'Tăng sub/follow (sale)',
                'display_name' => 'Tăng sub/follow (sale)',
                'slug' => Str::slug('sub-sale'),
            ],
            [
                'name' => 'Tăng like/follow page (speed)',
                'display_name' => 'Tăng like/follow page (speed)',
                'slug' => Str::slug('like-page-speed'),
            ],
            [
                'name' => 'Tăng like/follow page (sale)',
                'display_name' => 'Tăng like/follow page (sale)',
                'slug' => Str::slug('like-page-sale'),
            ],
            [
                'name' => 'Tăng mắt live',
                'display_name' => 'Tăng mắt live',
                'slug' => Str::slug('eye-live'),
            ],
            [
                'name' => 'Tăng view video',
                'display_name' => 'Tăng view video',
                'slug' => Str::slug('view-video'),
            ],
            [
                'name' => 'Tăng chia sẻ (profile)',
                'display_name' => 'Tăng chia sẻ (profile)',
                'slug' => Str::slug('share-profile'),
            ],
            [
                'name' => 'Tăng thành viên nhóm',
                'display_name' => 'Tăng thành viên nhóm',
                'slug' => Str::slug('member-group'),
            ],
            [
                'name' => 'Tăng view story',
                'display_name' => 'Tăng view story',
                'slug' => Str::slug('view-story'),
            ]
        ];
        foreach ($dataService as $data) {
            $service = [
                'name' => $data['name'],
                'display_name' => $data['display_name'],
                'slug' => $data['slug'],
                'sort' => 0,
                'icon' => '',
                'instructional_video' => 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ',
                'content' => '<ul>
                        <li><span style="color:#e74c3c">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>
                    </ul>
                    <ol>
                        <li>link <strong>avatar, bìa</strong>, <a href="https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru">Tại Đây</a></li>
                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href="https://prnt.sc/3hbTjFNcPwQz">Tại đây</a></strong></li>
                        <li>Link <strong>bài chia sẻ:&nbsp;<a href="https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>
                    </ol>
                    <ul>
                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>
                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style="color:#e74c3c"><strong>video </strong></span>hãy sử dụng <span style="color:#e74c3c"><strong>link post</strong></span>.&nbsp;<a href="https://prnt.sc/3hbTjFNcPwQz">HD tại đây</a></li>
                        <li>Nếu tăng 1 video trong <span style="color:#e74c3c">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style="color:#e74c3c"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>
                        <li>Tất cả server đều KBH like khi tụt.</li>
                    </ul>
                    <p><span style="color:#e74c3c"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>
                    <ul>
                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>
                        <li>Nếu like <span style="color:#e74c3c">group </span>công khai ,<span style="color:#e74c3c">video </span>và <span style="color:#e74c3c">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>
                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>
                    </ul>',
                'visible' => 1,
                'category_id' => 2,
                'identity_website' => config('license.domain'),
            ];
            Service::create($service);
        }

    }
}
