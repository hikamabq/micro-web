<?php 
use yii\helpers\Url;
?>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h3><?= $model['title'] ?></h3>
            <span class="date"><svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg> <?= date('d M Y', strtotime($model['created_at'])) ?></span>
            <img src="<?= Url::to('@web/uploads/'.$model['cover_image'].'') ?>" alt="" class="img-fluid">
            <p>
                <?= $model['content'] ?>
            </p>
        </div>
        <div class="col-lg-4 pt-3">
            <div class="bg-dark text-light py-2 px-3 d-block mb-3 text-uppercase">
                Lainnya
            </div>
            <div>
                <?php foreach($other as $data){ ?>
                    <div class="mb-3">
                        <a href="<?= Url::to(['read', 'slug' => $data['slug']]) ?>" class="text-decoration-none text-dark">
                            <span class="fw-semibold small d-block"><?= substr($data['title'], 0, 80) ?></span>
                            <span class="very-small text-danger"><?= $data['page']['name'] ?></span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>