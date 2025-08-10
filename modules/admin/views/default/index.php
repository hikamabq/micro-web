<?php

use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="p-5 bg-white rounded">
            <h3 class="text-dark">Welcome to hicome CMS</h3>
            <b>Get Started</b>
            <p>You can customize your site from here.</p>
            <p>
                <a href="<?= Url::to(['/admin/settings']) ?>" class="btn btn-success">Customize Site</a>
            </p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-5 bg-white rounded">
            <b class="d-block mb-3">Statistics</b>
            <div class="d-flex justify-content-between">
                <span>Total Posts</span>
                <a href="<?= Url::to(['/admin/posts']) ?>"><?= $posts ?></a>
            </div>
            <div class="d-flex justify-content-between">
                <span>Total Pages</span>
                <a href="<?= Url::to(['/admin/pages']) ?>"><?= $pages ?></a>
            </div>
            <div class="d-flex justify-content-between">
                <span>Total Media</span>
                <a href="<?= Url::to(['/admin/media']) ?>"><?= $media ?></a>
            </div>
        </div>
    </div>
</div>