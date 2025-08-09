<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AdminAsset;
use app\widgets\Alert;
use app\widgets\Menu;
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
        <div class="p-3">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="#3b82f6"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" /></svg>
                </div>
                <div>
                    <span class="text-light d-block brand-logo">halamia CMS</span>
                </div>
            </div>
        </div>

        <div class="sidebar-main p-2">
            <div class="sidebar-menu">
                <?= Menu::management(); ?>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header class="bg-white d-flex justify-content-between align-items-center p-2">
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                </label>
            </div>

            <div class="header-icons d-flex align-items-center">
                <a href="<?= Url::to(['/']) ?>" class="d-flex align-items-center bg-light p-2 gap-2 text-dark rounded">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M3.6 9h16.8" /><path d="M3.6 15h16.8" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a17 17 0 0 1 0 18" /></svg>
                    <span>Visit Website</span>
                </a>
                <div class="d-flex align-items-center">
                    <?php 
                    echo
                    Html::beginForm(['/site/logout'], 'post') .
                    Html::submitButton(
                        '<svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6a7.75 7.75 0 1 0 10 0" /><path d="M12 4l0 8" /></svg> Logout',
                        ['class' => 'btn py-2 btn-logout d-flex align-items-center gap-2']
                    ) .
                    Html::endForm() 
                    ?>

                </div>
            </div>
        </header>
        <main class="p-4">
            <?= Alert::widget() ?>
            <?= $content ?>
        </main>
    </div>
    <label for="sidebar-toggle" class="body-label"></label>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
