<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $model->id == null ? 'Create User' : 'Update User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\users\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="d-flex justify-content-between">
        <h3><?= Html::encode($this->title) ?></h3>
        <div class="form-group mb-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
            <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
        </div>
    </div>

    <div class="p-3 bg-white rounded pb-4 shadow-sm">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
