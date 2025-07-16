<?php

use app\modules\admin\models\posts\Posts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Components';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo Yii::$app->view->renderFile('@app/components/post_1.php', ['model' => $posts]); ?>
</div>