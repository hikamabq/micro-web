<?php

use app\widgets\Ui;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\pages\Pages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= Ui::posts() ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success px-3']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-light text-danger px-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
