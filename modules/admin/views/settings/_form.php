<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\settings\Settings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="shadow-sm p-3 bg-white rounded mb-3">
        <div class="row">
            <div class="col-md-6">
                <?php if($model->id != null){ ?>
                    <?= $form->field($model, 'logo_header')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'browseClass' => 'btn btn-success',
                            'initialPreview'=>[
                                Url::to(['@web/uploads/'.$model->logo_header.''])
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
                    <?= $form->field($model, 'logo_header')->widget(FileInput::classname(), [
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
            
                <?= $form->field($model, 'logo_header_width')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?php if($model->id != null){ ?>
                    <?= $form->field($model, 'logo_footer')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'browseClass' => 'btn btn-success',
                            'initialPreview'=>[
                                Url::to(['@web/uploads/'.$model->logo_footer.''])
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
                    <?= $form->field($model, 'logo_footer')->widget(FileInput::classname(), [
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
            
                <?= $form->field($model, 'logo_footer_width')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <div class="shadow-sm p-3 bg-white rounded mb-3">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'tagline')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <div class="shadow-sm p-3 bg-white rounded mb-3">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
