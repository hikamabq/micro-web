<?php

use app\modules\admin\models\pages\Pages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\pages\PagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index p-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pages', ['create'], ['class' => 'btn btn-success px-3']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'tableOptions' => [
            'class' => 'table table-bordered'
        ],
        'columns' => [
            [
                'headerOptions' => [
                    'style' => 'width:40px; min-width:40px; max-width:40px;'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'header' => '',
                'class' => 'yii\grid\SerialColumn'
            ],
            'name',
            [
                'attribute' => 'slug',
                'value' => function($model){
                    return '/'.$model->slug;
                }
            ],
            'description',
            // 'created_at',
            //'updated_at',
            //'deleted_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Pages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
