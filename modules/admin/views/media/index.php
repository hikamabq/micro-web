<?php

use app\modules\admin\models\media\Media;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\media\MediaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Upload Media', ['create'], ['class' => 'btn btn-success px-4']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="p-3 px-4 bg-white rounded shadow-sm">
        <div class="row">
            <?php foreach($dataProvider->models as $data){ ?>
            <div class="col-4 col-sm-3 col-md-2 p-1">
                <div class="card rounded-0 border-0">
                    <div class="card-body h-100 p-0">
                        <img src="<?= Url::to('@web/uploads/'.$data['name'].'') ?>" class="img-fluid position-relative" alt="">
                        <a href="<?= Url::to(['delete', 'id' => $data['id']]) ?>" class="position-absolute top-0 end-0 bg-white p-1" data-confirm="Are you sure you want to delete this item?" data-method="post">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="red"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php Pjax::end(); ?>

</div>
