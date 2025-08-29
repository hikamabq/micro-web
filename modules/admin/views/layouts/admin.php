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
                <div class="me-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="#475569"  class="icon icon-tabler icons-tabler-filled icon-tabler-copyright"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-2.34 5.659a4.016 4.016 0 0 0 -5.543 .23a3.993 3.993 0 0 0 0 5.542a4.016 4.016 0 0 0 5.543 .23a1 1 0 0 0 -1.32 -1.502c-.81 .711 -2.035 .66 -2.783 -.116a1.993 1.993 0 0 1 0 -2.766a2.016 2.016 0 0 1 2.783 -.116a1 1 0 0 0 1.32 -1.501z" /></svg>
                </div>
                <div>
                    <span class="text-light d-block brand-logo">Conteno CMS</span>
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
        <header class="bg-trans d-flex justify-content-between align-items-center py-2 px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="menu-toggle d-block d-lg-none">
                    <label for="sidebar-toggle">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                    </label>
                </div>
                <div>
                    <?php 
                    if (!empty($this->params['breadcrumbs'])) {
                        echo Breadcrumbs::widget([
                            'options' => ['class' => 'breadcrumb'], // class breadcrumb Bootstrap
                            'homeLink' => [
                                'label' => 'Dashboard',
                                'url' => ['/admin'],
                                'class' => 'breadcrumb-item'
                            ],
                            'links' => $this->params['breadcrumbs'],
                            'itemTemplate' => "<li class=\"breadcrumb-item\">{link} </li>\n", // link biasa
                            'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n", // link aktif
                        ]);
                    }
                    ?>
                    <!-- <ul class="breadcrumb">
                        <li><a href="#">First level</a></li>
                        <li><a href="#">Second level</a></li>
                        <li><a href="#">Third level</a></li>
                        <li><a href="#">Current level</a></li>
                    </ul> -->
                </div>
            </div>

            <div class="header-icons d-flex align-items-center">
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
