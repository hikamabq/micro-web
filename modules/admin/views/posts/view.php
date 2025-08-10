<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\Posts $model */

$this->title = 'Preview';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">
    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-light px-4']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success px-4']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger px-4',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="p-3 bg-white rounded">
        <div class="row">
            <div class="col-md-10">
                <h3><?= Html::encode($this->title) ?></h3>
                <span class="date d-block"><svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg> <?= date('d M Y', strtotime($model->created_at)) ?></span>
                <img src="<?= Url::to('@web/uploads/'.$model->cover_image.'') ?>" alt="" class="img-fluid rounded">
                <p>
                    <?= $model->content ?>
                </p>
            </div>
        </div>
    </div>


</div>
