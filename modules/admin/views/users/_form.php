<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\users\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn px-3 btn-light']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn px-3 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
