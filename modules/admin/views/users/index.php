<?php

use app\modules\admin\models\users\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\users\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <?php Pjax::begin(); ?>

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success px-4']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout' => '{items}{summary}{pager}',
            'tableOptions' => [
                'class' => 'table table-bordered shadow'
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
                'username',
                'email',
                // 'password:ntext',
                // 'password_reset_token:ntext',
                // 'auth_key',
                //'access_token',
                //'role',
                'created_at',
                [
                    'headerOptions' => [
                        'style' => 'width:100px; min-width:100px; max-width:100px;'
                    ],
                    'class' => ActionColumn::className(),
                    'template' => '{update} {delete}',
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
                    'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>
