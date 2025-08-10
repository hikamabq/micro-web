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

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success px-4']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="p-3 bg-white rounded">
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

                // 'id',
                // 'id_pages',
                // [
                //     'attribute' => 'cover_image',
                //     'format' => 'raw',
                //     'value' => function($model){
                //         return Html::img('@web/uploads/'.$model->cover_image.'', ['style' => 'width:50px;']);
                //     }
                // ],
                [
                    'attribute' => 'title',
                    'value' => function($model){
                        return strlen($model->title) > 60 ? substr($model->title, 0, 60).'...' : $model->title;
                    }
                ],
                // 'slug',
                // 'cover_image',
                [
                    'attribute' => 'page',
                    'value' => 'page.name'
                ],
                // 'content:ntext',
                'author',
                // 'status',
                [
                    'attribute' => 'created_at',
                    // 'format' => 'relativeTime', // displays as "2 hours ago"
                    'format' => ['date', 'php:d M Y H:i'],
                ],
                // 'created_at',
                //'updated_at',
                //'deleted_at',
                [
                    'class' => ActionColumn::className(),
                    'buttons' => [
                        'view' => function ($url,$model,$key) {
                            return Html::a('Preview', ['view', 'id' => $model->id], ['class' => 'px-2 bg-white bg-opacity-10 border rounded-1']);
                        },
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
                    ],
                    'urlCreator' => function ($action, Posts $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>
