<?php

use app\models\posts\Posts;
use yii\helpers\Url;
$html = $pages->html_content;
// mulai isi replacement
$replacement3 = '<div class="row">';
foreach ($model as $data) {
    $replacement3 .= '
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card border-0 h-100 posts">
                <div class="card-body border-0 p-0 h-100">
                    <a href="' . Url::to(['read', 'slug' => $data->slug]) . '">
                        <div class="cover_image">
                            <img src="' . Url::to('@web/uploads/' . $data->cover_image) . '" alt="" class="img-fluid">
                        </div>
                    </a>
                </div>
                <div class="card-footer bg-white border-0 px-0 h-100 posts">
                    <span class="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                             <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                             <path d="M12 10l0 3l2 0" />
                             <path d="M7 4l-2.75 2" />
                             <path d="M17 4l2.75 2" />
                        </svg> ' . date('d M Y', strtotime($data->created_at)) . '
                    </span>
                    <a href="' . Url::to(['read', 'slug' => $data->slug]) . '">
                        <b class="small">' . htmlspecialchars($data->title) . '</b>
                    </a>
                </div>
            </div>
        </div>
    ';
}

$replacement3 .= '</div>';
$replacement4 = '<div class="row">';
foreach ($model as $data) {
    $replacement4 .= '
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 h-100 posts">
                <div class="card-body border-0 p-0 h-100">
                    <a href="' . Url::to(['read', 'slug' => $data->slug]) . '">
                        <div class="cover_image">
                            <img src="' . Url::to('@web/uploads/' . $data->cover_image) . '" alt="" class="img-fluid">
                        </div>
                    </a>
                </div>
                <div class="card-footer bg-white border-0 px-0 h-100 posts">
                    <span class="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                             <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                             <path d="M12 10l0 3l2 0" />
                             <path d="M7 4l-2.75 2" />
                             <path d="M17 4l2.75 2" />
                        </svg> ' . date('d M Y', strtotime($data->created_at)) . '
                    </span>
                    <a href="' . Url::to(['read', 'slug' => $data->slug]) . '">
                        <b class="small">' . htmlspecialchars($data->title) . '</b>
                    </a>
                </div>
            </div>
        </div>
    ';
}

$replacement4 .= '</div>';

// $result = $output = str_replace('<!-- dynamic_post_3 -->', $replacement, $html);
// siapkan array marker yang mungkin ada
$markers   = ['<!-- dynamic_post_3 -->', '<!-- dynamic_post_4 -->'];
$replacers = [$replacement3, $replacement4];

// lakukan replace sekaligus
$result = str_replace($markers, $replacers, $html);
?>
<style>
    <?= $pages->css_content ?>
</style>
<div class="">
    <?= $result ?>
</div>