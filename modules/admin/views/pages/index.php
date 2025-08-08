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
<div class="pages-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success px-3']) ?>
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
            'description',
            [
                'attribute' => 'slug',
                'format' => 'raw',
                'value' => function($model){
                    $host = $_SERVER['HTTP_HOST'];
                    return '<span>'.$host.'/'.$model->slug.'</span>';
                }
            ],
            'layout',
            // 'created_at',
            //'updated_at',
            //'deleted_at',
            [
                'headerOptions' => [
                    'style' => 'width:150px; min-width:150px; max-width:150px;'
                ],
                'class' => ActionColumn::className(),
                'template' => '{update} {delete} {page-builder} ',
                'buttons' => [
                    'page-builder' => function ($url,$model,$key) {
                        if($model->layout == 'custom'){
                            return Html::a('Customize', ['page-builder', 'id' => $model->id], ['class' => 'px-1 bg-white bg-opacity-10 text-secondary border rounded-1']);
                        }
                    },
                ],
                'urlCreator' => function ($action, Pages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
