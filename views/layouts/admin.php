<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="">
<head>
    <title></title>
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>

    <input type="checkbox" name="" id="sidebar-toggle">
    <div class="sidebar">
        <div class="text-dark mb-3 d-flex align-items-center justify-content-start">
            <div class="me-3">
                <!-- <img src="<?= Url::to('@web/logo.png') ?>" alt="" width="50px"> -->
            </div>
            <div>
                <span class="fw-bold d-block mb-0">Micro</span>
                <span class="small text-secondary">Management System</span>
            </div>
        </div>

        <div class="sidebar-main">
            <div class="sidebar-menu pt-3">
                <a href="<?= Url::to('/admin') ?>" class=" d-block p-2 mb-0 rounded d-flex align-items-center <?= (Yii::$app->controller->id == 'default' ? 'menu-orange' : 'text-secondary list-menu') ?> ">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
                    <span class="ps-2">Dashboard</span>
                </a>
                <a href="<?= Url::to('/admin/test') ?>" class=" d-block p-2 mb-0 rounded d-flex align-items-center <?= (Yii::$app->controller->id == 'test' ? 'menu-orange' : 'text-secondary list-menu') ?> ">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-database-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" /><path d="M4 6v6c0 1.657 3.582 3 8 3c.415 0 .822 -.012 1.22 -.035" /><path d="M20 10v-4" /><path d="M4 12v6c0 1.657 3.582 3 8 3c.352 0 .698 -.009 1.037 -.025" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>
                    <span class="ps-2">Test</span>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header class="bg-white d-flex justify-content-between align-items-center p-2">
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                </label>
            </div>

            <div class="header-icons">
                <?php 
                echo
                Html::beginForm(['/site/logout'], 'post') .
                Html::submitButton(
                    '<svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6a7.75 7.75 0 1 0 10 0" /><path d="M12 4l0 8" /></svg> Logout',
                    ['class' => 'btn py-2 btn-logout']
                ) .
                Html::endForm() 
                 ?>
            </div>
        </header>
        <div class="bg-white mb-3">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget([
                    'homeLink' => [ 
                        'label' => 'Dashboard',
                        'url' => '/admin',
                    ],
                    'links' => $this->params['breadcrumbs']
                ]) ?>
            <?php endif ?>
        </div>
        <main class="px-4 pt-0 pb-5">
            <?= $content ?>
        </main>
    </div>
    <label for="sidebar-toggle" class="body-label"></label>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
