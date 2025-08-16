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

    <div class="p-3 bg-white rounded mb-3 shadow-sm">
        <?= $form->field($model, 'name[]')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true
            ],
            'pluginOptions' => [
                'browseClass' => 'btn btn-success',
                'showRemove' => false,
                'showCancel' => false,
                'showUpload' => false,
                'browseLabel' =>  'Select Photo',
                'showCaption' => false,
            ]
        ])->label(false); ?>
    </div>

    <div class="form-group mt-3">
        <?= Html::a('Cancel', ['index'], ['class' => 'btn px-4 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
