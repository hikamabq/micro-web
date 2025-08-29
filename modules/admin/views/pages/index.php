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

    <div class="d-flex justify-content-between">
        <h3><?= Html::encode($this->title) ?></h3>
    
        <p>
            <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success px-4']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout' => '{items}{summary}{pager}',
            'tableOptions' => [
                'class' => 'table table-bordered shadow-sm'
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
                        return '/'.$model->slug.'';
                    }
                ],
                [
                    'attribute' => 'layout',
                    'format' => 'raw',
                    'value' => function($model){
                        if($model->layout == 'custom'){
                            return '<span class="small py-1 px-2 bg-success bg-opacity-10 text-success d-inline align-items-center me-2 rounded-1"><svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="#22c55e"  class="icon icon-tabler icons-tabler-filled icon-tabler-template"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 3a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2z" /><path d="M9 11a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2z" /><path d="M20 11a1 1 0 0 1 0 2h-6a1 1 0 0 1 0 -2z" /><path d="M20 15a1 1 0 0 1 0 2h-6a1 1 0 0 1 0 -2z" /><path d="M20 19a1 1 0 0 1 0 2h-6a1 1 0 0 1 0 -2z" /></svg> Custom </span>';
                        }else{
                            return '<span class="small py-1 px-2 bg-success bg-opacity-10 text-success d-inline align-items-center me-2 rounded-1"><svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="#22c55e"  class="icon icon-tabler icons-tabler-filled icon-tabler-article"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 3a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-2 12h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm0 -4h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm0 -4h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" /></svg> Post </span> '.$model->layout.'';
                        }
                    }
                ],
                // 'created_at',
                //'updated_at',
                //'deleted_at',
                [
                    'headerOptions' => [
                        'style' => 'width:180px; min-width:180px; max-width:180px;'
                    ],
                    'class' => ActionColumn::className(),
                    'template' => '{update} {delete} {page-builder} ',
                    'buttons' => [
                        'update' => function ($url,$model,$key) {
                            return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="12"  height="12"  viewBox="0 0 24 24"  fill="none"  stroke="#64748b"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>', ['update', 'id' => $model->id], ['class' => 'px-1 bg-white bg-opacity-10 border rounded-1']);
                        },
                        'delete' => function ($url,$model,$key) {
                            return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="12"  height="12"  viewBox="0 0 24 24"  fill="none"  stroke="#64748b"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>', ['delete', 'id' => $model->id], [
                                'class' => 'px-1 bg-white bg-opacity-10 border rounded-1',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                        'page-builder' => function ($url,$model,$key) {
                            if($model->layout == 'custom'){
                                return Html::a('Customize', ['page-builder', 'slug' => $model->slug], ['class' => 'px-2 bg-white bg-opacity-10 text-secondary border rounded-1']);
                            }
                        },
                    ],
                    'urlCreator' => function ($action, Pages $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>
