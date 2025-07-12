<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>
    <p>
        <?= Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'phone',
            // ...
        ],
    ]) ?>
    <?php Pjax::end(); ?>