<?php 
use yii\helpers\Url;
?>
<div class="container">
    <div class="py-5">
        <h1><?= $pages->name ?></h1>
        <p><?= $pages->description ?></p>
    </div>
    <div class="row">
        <?php foreach($model as $data){ ?>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card border-0 h-100 posts">
                    <div class="card-body border-0 p-0 h-100">
                        <a href="<?= Url::to(['read', 'slug' => $data['slug']]) ?>">
                            <div class="cover_image rounded">
                                <img src="<?= Url::to('@web/uploads/'.$data['cover_image'].'') ?>" alt="" class="img-fluid rounded">
                            </div>
                        </a>
                    </div>
                    <div class="card-footer bg-white border-0 px-0 h-100">
                        <span class="date"><svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg> <?= date('d M Y', strtotime($data['created_at'])) ?></span>
                        <a href="<?= Url::to(['read', 'slug' => $data['slug']]) ?>">
                            <b class="small"><?= $data['title'] ?></b>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>