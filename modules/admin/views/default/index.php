<?php

use yii\helpers\Url;

$this->title = 'Dashboard';
?>
<div class="p-5 bg-white rounded shadow-sm">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-dark">Welcome to hicome CMS</h3>
            <b>Get Started</b>
            <p>You can customize your site from here.</p>
            <p>
                <a href="<?= Url::to(['/admin/settings']) ?>" class="btn btn-success px-4">Customize Site</a>
            </p>
        </div>
        <div class="col-md-6">
            <b class="d-block mb-1">Statistics</b>
            <div class="d-flex justify-content-between">
                <span>Posts</span>
                <a href="<?= Url::to(['/admin/posts']) ?>"><?= $posts ?></a>
            </div>
            <div class="d-flex justify-content-between">
                <span>Pages</span>
                <a href="<?= Url::to(['/admin/pages']) ?>"><?= $pages ?></a>
            </div>
            <div class="d-flex justify-content-between">
                <span>Media</span>
                <a href="<?= Url::to(['/admin/media']) ?>"><?= $media ?></a>
            </div>
            <div class="d-flex justify-content-between">
                <span>Users</span>
                <a href="<?= Url::to(['/admin/users']) ?>"><?= $users ?></a>
            </div>
        </div>
    </div>
</div>