<div class="border p-5 rounded text-center <?= $model['style']['background'] ?> <?= $model['style']['color'] ?>">
    <div class="mb-3">
        <h3><?= $model['data']['title'] ?></h3>
        <span><?= $model['data']['subtitle'] ?></span>
    </div>
    <div class="d-flex">
        <div>
            <?= $model['data']['content'] ?>
        </div>
    </div>
</div>