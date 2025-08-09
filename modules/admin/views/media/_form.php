<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\media\Media $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'browseClass' => 'btn btn-success',
            'showRemove' => false,
            'showCancel' => false,
            'showUpload' => false
        ]
    ]); ?>

    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-3 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-3 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
