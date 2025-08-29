<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $model->id == null ? 'Create Page' : 'Update Page';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="d-flex justify-content-between">
        <h3><?= Html::encode($this->title) ?></h3>
        <div class="form-group mb-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn px-4 btn-light']) ?>
            <?= Html::submitButton('Save', ['class' => 'btn px-4 btn-success']) ?>
        </div>
    </div>

    <div class="p-3 bg-white rounded mb-3 shadow-sm">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?php 
        echo $form->field($model, 'layout')->radioList([
            'blog_post1' => 'Blog Post 1',
            'blog_post2' => 'Blog Post 2',
            'blog_post3' => 'Blog Post 3',
            'single_post' => 'Single Post',
            'custom' => 'Custom',
        ], [
            'item' => function($index, $label, $name, $checked, $value) {
                return '
                <div class="d-inline me-2">
                    <label class="">
                        <div class="d-flex align-items-center gap-2">
                            <input type="radio" name="' . $name . '" value="' . $value . '"' . ($checked ? ' checked' : '') . '> 
                            '. $label.'
                        </div>
                        <img src="' . Yii::getAlias('@web/ui/'.$value.'.svg') . '" style="max-width:150px" class="border rounded mb-3">
                    </label>
                </div>';
            }
        ]);
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
