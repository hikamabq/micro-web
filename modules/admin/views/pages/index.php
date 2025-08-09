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
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success px-4']) ?>
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
            // 'description',
            [
                'attribute' => 'slug',
                'format' => 'raw',
                'value' => function($model){
                    $host = $_SERVER['HTTP_HOST'];
                    $protocol = $host ? 'http' : 'https';
                    return '<a href="'.$protocol.'://'.$host.'/'.$model->slug.'" class="text-primary">'.$host.'/'.$model->slug.'</a>';
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
                    'view' => function ($url,$model,$key) {
                        return Html::a('Detail Data', ['view', 'id' => $model->id], ['class' => 'px-1 bg-white bg-opacity-10 text-secondary text-opacity-75 border rounded']);
                    },
                    'update' => function ($url,$model,$key) {
                        return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="12"  height="12"  viewBox="0 0 24 24"  fill="none"  stroke="#64748b"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>', ['update', 'id' => $model->id], ['class' => 'px-1 bg-white bg-opacity-10 border rounded']);
                    },
                    'delete' => function ($url,$model,$key) {
                        return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="12"  height="12"  viewBox="0 0 24 24"  fill="none"  stroke="#64748b"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>', ['delete', 'id' => $model->id], [
                            'class' => 'px-1 bg-white bg-opacity-10 border rounded',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    },
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
