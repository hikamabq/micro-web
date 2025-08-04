<?php 
use yii\helpers\Url;
?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h1><?= $model['title'] ?></h1>
            <span class="date"><svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg> <?= date('d M Y', strtotime($model['created_at'])) ?></span>
            <img src="<?= Url::to('@web/uploads/'.$model['cover_image'].'') ?>" alt="" class="img-fluid rounded">
            <p>
                <?= $model['content'] ?>
            </p>
        </div>
        <div class="col-md-4 pt-3">
            <div class="bg-dark text-light py-2 px-3 d-inline rounded">
                Lainnya
            </div>
            <ul class="list-group">
                <?php foreach($other as $data){ ?>
                    <li class="list-group-item">
                        <a href="<?= Url::to(['read', 'slug' => $data['slug']]) ?>" class="text-decoration-none text-dark">
                            <div>
                                <span><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-point"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 7a5 5 0 1 1 -4.995 5.217l-.005 -.217l.005 -.217a5 5 0 0 1 4.995 -4.783z" /></svg></span>
                                <span class="small">
                                    <?= substr($data['title'], 0, 30) ?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>