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
            <div class="shadow-sm p-3 bg-white rounded mb-3">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'content')->widget(Summernote::class, [
                    'useKrajeePresets' => true,
                ]); ?>
    
                <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="shadow-sm p-3 bg-white rounded mb-3">
                <?php if($model->id != null){ ?>
                <?= $form->field($model, 'cover_image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'browseClass' => 'btn btn-success',
                        'initialPreview'=>[
                            Url::to(['@web/uploads/'.$model->cover_image.''])
                        ],
                        'initialPreviewAsData'=>true,
                        'showRemove' => false,
                        'showCancel' => false,
                        'showUpload' => false,
                        'browseLabel' =>  'Select Photo',
                        'showCaption' => false,
                    ]
                ]); ?>
                <?php }else{ ?>
                <?= $form->field($model, 'cover_image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'browseClass' => 'btn btn-success',
                        'showRemove' => false,
                        'showCancel' => false,
                        'showUpload' => false,
                        'browseLabel' =>  'Select Photo',
                        'showCaption' => false,
                    ]
                ]); ?>
                <?php } ?>
            </div>
            <div class="shadow-sm p-3 bg-white rounded">
                <?= $form->field($model, 'id_pages')->radioList(
                    ArrayHelper::map(Pages::find()->where(['<>', 'layout', 'custom'])->all(), 'id', 'name'), 
                    [
                        'item' => function($index, $label, $name, $checked, $value) {
                            return '<div class="d-block my-2 w-100 bg-light p-2 rounded"><div class="radio"><label class="w-100 d-flex align-items-center">' . 
                                Html::radio($name, $checked, ['value' => $value, 'class' => 'me-2']) . 
                                $label . 
                                '</label></div></div>';
                        }
                    ]); 
                ?> 
            </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
