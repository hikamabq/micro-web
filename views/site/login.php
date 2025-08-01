<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-4"></div>
        <div class="col-md-6 col-lg-4">
            <div class="site-login mt-3">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                        'inputOptions' => ['class' => 'col-lg-3 form-control'],
                        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                    ],
                ]); ?>
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            
                <?= $form->field($model, 'password')->passwordInput() ?>
            
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>
            
                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Login', ['class' => 'btn btn-success w-100', 'name' => 'login-button']) ?>
                    </div>
                </div>
            
                <?php ActiveForm::end(); ?>
            
            </div>
        </div>
        <div class="col-md-3 col-lg-4"></div>
    </div>
</div>
