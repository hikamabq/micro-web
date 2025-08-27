<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\settings\Settings $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="settings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'logo_header',
            'logo_header_width',
            'logo_footer',
            'logo_footer_width',
            'title',
            'tagline',
            'description:ntext',
            'address',
            'email:email',
            'phone',
            'facebook',
            'instagram',
            'youtube',
            'tiktok',
            'linkedin',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
