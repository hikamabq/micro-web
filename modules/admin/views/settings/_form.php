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
    <div class="row">
        <div class="col-md-12">
            <div class="shadow-sm">
                <div class="p-3 bg-white border-bottom rounded-top">
                    <b class="d-block">Logo</b>
                </div>
                <div class="p-3 bg-white rounded-bottom mb-3">
                    <?php if($model->id != null && !empty($model->logo)){ ?>
                    <?= $form->field($model, 'logo')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                        ],
                        'pluginOptions' => [
                            'browseClass' => 'btn btn-success',
                            'initialPreview'=>[
                                Url::to(['@web/uploads/'.$model->logo.''])
                            ],
                            'initialPreviewAsData'=>true,
                            'showRemove' => false,
                            'showCancel' => false,
                            'showUpload' => false,
                            'browseLabel' =>  'Select Photo',
                            'showCaption' => false,
                        ]
                    ])->label(false); ?>
                    <?php }else{ ?>
                    <?= $form->field($model, 'logo')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
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
                    <?php } ?>

                    <?= $form->field($model, 'logo_width')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="shadow-sm">
                <div class="p-3 bg-white border-bottom rounded-top">
                    <b class="d-block">Profile</b>
                </div>
                <div class="p-3 bg-white mb-3 rounded-bottom">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                
                    <?= $form->field($model, 'tagline')->textInput(['maxlength' => true]) ?>
    
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="shadow-sm">
                <div class="p-3 bg-white border-bottom rounded-top">
                    <b class="d-block">Contact</b>
                </div>
                <div class="p-3 bg-white mb-3 rounded-bottom">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    
    
                    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
    
                    <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
    
                    <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
    
                    <?= $form->field($model, 'tiktok')->textInput(['maxlength' => true]) ?>
    
                    <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
