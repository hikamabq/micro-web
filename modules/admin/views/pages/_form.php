<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h3><?= $this->title; ?></h3>

<div class="form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?php 
    $options = [
        'blog_post1' => 'Blog Post 1<br><img src="' . Yii::getAlias('@web/ui/blog_post1.png') . '" style="max-width:200px" class="border rounded">',
        'blog_post2' => 'Blog Post 2<br><img src="' . Yii::getAlias('@web/ui/blog_post2.png') . '" style="max-width:200px" class="border rounded">',
        'single_post' => 'Single Post<br><img src="' . Yii::getAlias('@web/ui/single_post.png') . '" style="max-width:200px" class="border rounded">',
    ];
    ?>
    <?= $form->field($model, 'layout')->radioList($options, ['encode' => false]); ?> 

    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-3 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-3 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
