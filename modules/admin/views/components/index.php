<?php

use app\modules\admin\models\posts\Posts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Components';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="border p-3">
        <h3><?= $posts['title'] ?></h3>
        <span><?= $posts['subtitle'] ?></span>
        <div class="d-flex">
            <div>
                <?= $posts['content'] ?>
            </div>
            <div>
                <img src="<?= $posts['cover_image'] ?>" alt="" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>