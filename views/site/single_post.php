<?php 
use yii\helpers\Url;
?>
<div class="container py-5">
    <?php foreach($model as $data){ ?>
        <h1><?= $data['title'] ?></h1>
        <img src="<?= Url::to('@web/uploads/'.$data['cover_image'].'') ?>" alt="" class="img-fluid rounded">
        <p>
            <?= $data['content'] ?>
        </p>
    <?php } ?>
</div>