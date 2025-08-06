<?php 
use yii\helpers\Url;
?>
<div class="container py-5">
    <div class="py-5 text-center">
        <h1><?= $pages->name ?></h1>
        <p><?= $pages->description ?></p>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php foreach($model as $data){ ?>
                <h3><?= $data['title'] ?></h3>
                <img src="<?= Url::to('@web/uploads/'.$data['cover_image'].'') ?>" alt="" class="w-100 rounded">
                <p>
                    <?= $data['content'] ?>
                </p>
            <?php } ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>