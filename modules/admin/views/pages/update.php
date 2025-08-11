<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\pages\Pages $model */

$this->title = 'Update Page: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
