<?php

namespace app\widgets;

use Yii;
use yii\helpers\Url;

class Ui
{
    public static function banner()
    {
        $ui = [
            [
                'name' => 'Banner 1',
                'url' => Url::to('@web/ui/banner1.png')
            ],
            [
                'name' => 'Banner 2',
                'url' => Url::to('@web/ui/banner2.png')
            ],
            [
                'name' => 'Banner 3',
                'url' => Url::to('@web/ui/banner3.png')
            ],
        ];

        echo '<div class="row mt-3">';
        foreach ($ui as $data) {
            echo '
            <div class="col-md-3 mb-3">
                <div class="border rounded h-100">
                    <span class="d-block small p-3 pb-0">'.$data['name'].'</span>
                    <img src="'.$data['url'].'" class="img-fluid">
                </div>
            </div>';
        }
        echo '</div>';
    }
    public static function posts()
    {
        $ui = [
            [
                'name' => 'Single Post',
                'url' => Url::to('@web/ui/single_post.png')
            ],
            [
                'name' => 'Single Post Sidebar',
                'url' => Url::to('@web/ui/single_post_sidebar.png')
            ],
            [
                'name' => 'Blog Post 1',
                'url' => Url::to('@web/ui/blog_post1.png')
            ],
            [
                'name' => 'Blog Post 2',
                'url' => Url::to('@web/ui/blog_post2.png')
            ],
            [
                'name' => 'Blog Post 3',
                'url' => Url::to('@web/ui/blog_post3.png')
            ],
            [
                'name' => 'Blog Post 4',
                'url' => Url::to('@web/ui/blog_post4.png')
            ],
        ];

        echo '<div class="row mt-3">';
        foreach ($ui as $data) {
            echo '
            <div class="col-md-3 mb-3">
                <div class="border rounded h-100">
                    <span class="d-block small p-3 pb-0">'.$data['name'].'</span>
                    <img src="'.$data['url'].'" class="img-fluid">
                </div>
            </div>';
        }
        echo '</div>';
    }
}