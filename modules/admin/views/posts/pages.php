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

$this->title = ucfirst($model->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Create Posts', ['create', 'pages' => $_GET['pages']], ['class' => 'btn btn-success px-3']) ?>
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

            // 'id',
            // 'id_pages',
            'title',
            // 'slug',
            'cover_image',
            // 'content:ntext',
            //'author',
            // 'status',
            //'created_at',
            //'updated_at',
            //'deleted_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Posts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
