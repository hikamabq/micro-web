<?php

use app\modules\admin\models\pages\Pages;
use kartik\editors\Summernote;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'content')->widget(Summernote::class, [
                'useKrajeePresets' => true,
            ]); ?>

            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_pages')->dropDownList(
                ArrayHelper::map(Pages::find()->all(), 'id', 'name')
            ) ?>
        </div>
        <div class="col-md-4">
            <?php if($model->id != null){ ?>
            <?= $form->field($model, 'cover_image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview'=>[
                        Url::to(['@web/uploads/'.$model->cover_image.''])
                    ],
                    'initialPreviewAsData'=>true,
                    'showRemove' => false,
                    'showCancel' => false,
                    'showUpload' => false
                ]
            ]); ?>
            <?php }else{ ?>
            <?= $form->field($model, 'cover_image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showRemove' => false,
                    'showCancel' => false,
                    'showUpload' => false
                ]
            ]); ?>
            <?php } ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-3 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-3 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
