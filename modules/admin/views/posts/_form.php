<?php

use app\modules\admin\models\pages\Pages;
use kartik\editors\Summernote;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $model->id == null ? 'Create Post' : 'Update Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\Posts $model */
/** @var yii\widgets\ActiveForm $form */
$this->registerCssFile(
    '@web/richtexteditor/rte_theme_default.css'
);
$this->registerJsFile(
    '@web/richtexteditor/rte.js'
);
$this->registerJsFile(
    '@web/richtexteditor/plugins/all_plugins.js'
);
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="d-flex justify-content-between">
        <h3><?= Html::encode($this->title) ?></h3>
        <div class="form-group mb-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
            <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="shadow-sm p-3 bg-white rounded mb-3">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'content')->textarea(['id' => 'editor']); ?>

                <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'id_pages')->radioList(
                            ArrayHelper::map(Pages::find()->all(), 'id', 'name'), 
                            [
                                'item' => function($index, $label, $name, $checked, $value) {
                                    return '<div class="d-block my-2 w-100 bg-light p-2 border rounded"><div class="radio"><label class="w-100 d-flex align-items-center">' . 
                                        Html::radio($name, $checked, ['value' => $value, 'class' => 'me-2']) . 
                                        $label . 
                                        '</label></div></div>';
                                }
                            ]); 
                        ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
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
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
$this->registerJs('
    var editor1 = new RichTextEditor("#editor", { editorResizeMode: "height" });
');
?>