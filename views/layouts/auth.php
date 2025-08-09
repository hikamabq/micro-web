<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AdminAsset;
use app\models\pages\Pages;
use app\widgets\Alert;
use yii\helpers\Url;

AdminAsset::register($this);
$pages = Pages::find()->select(['name','slug'])->all();

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title></title>
    <?php $this->head() ?>
</head>
<body class="bg-theme">
<?php $this->beginBody() ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-4 p-5 vh-100 bg-white">
            <div class="d-flex align-items-center justify-content-start mb-3">
                <div class="me-3">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="52"  height="52"  viewBox="0 0 24 24"  fill="none"  stroke="#2563eb"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" /></svg>
                </div>
                <div>
                    <span class="text-dark d-block brand-logo">halamia CMS</span>
                    <p class="text-dark text-opacity-50">Easy-to-use and customizable</p>
                </div>
            </div>
            <?= $content ?>
        </div>
        <div class="col-sm-6 col-lg-8 bg-light d-flex align-items-center justify-content-center">

        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
