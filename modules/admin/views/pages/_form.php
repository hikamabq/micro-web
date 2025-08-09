<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h3><?= $this->title; ?></h3>

<div class="form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="p-3 bg-white rounded mb-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="p-3 bg-white rounded mb-3">

        <?php 
        $options = [
            'blog_post1' => 'Blog Post 1<br><img src="' . Yii::getAlias('@web/ui/blog_post1.svg') . '" style="max-width:170px" class="border rounded">',
            'blog_post2' => 'Blog Post 2<br><img src="' . Yii::getAlias('@web/ui/blog_post2.svg') . '" style="max-width:170px" class="border rounded">',
            'blog_post3' => 'Blog Post 3<br><img src="' . Yii::getAlias('@web/ui/blog_post3.svg') . '" style="max-width:170px" class="border rounded">',
            'single_post' => 'Single Post<br><img src="' . Yii::getAlias('@web/ui/single_post.svg') . '" style="max-width:170px" class="border rounded">',
            'custom' => 'Custom<br><img src="' . Yii::getAlias('@web/ui/custom.svg') . '" style="max-width:170px" class="border rounded">',
        ];
        ?>
        <?= $form->field($model, 'layout')->radioList($options, ['encode' => false]); ?> 
    </div>


    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
