<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\pages\Pages;
use app\models\settings\Settings;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$pages = Pages::find()->select(['name','slug'])->all();
$setting = Settings::findOne(['id' => 1]);

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
<body class="bg-white">
<?php $this->beginBody() ?>
  <?php if(Yii::$app->user->isGuest){ ?>
  <?php }else{ ?>
    <div class="bg-dark p-2">
        <div class="container">
            <a href="<?= Url::to('/admin/default') ?>" class="text-light text-decoration-none small"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg> Back to Dashboard</a>
        </div>
    </div>
  <?php } ?>
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a class="navbar-brand" href="<?= Url::to(['index']) ?>"> 
                <div class="d-flex align-items-center justify-content-start">
                    <div class="me-1">
                        <?php 
                        if($setting->logo_header != null){
                            echo Html::img('@web/uploads/'.$setting->logo_header.'', ['style' => 'width:'.$setting->logo_header_width.';']);
                        }else{
                            echo '<svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="#475569"  class="icon icon-tabler icons-tabler-filled icon-tabler-copyright"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-2.34 5.659a4.016 4.016 0 0 0 -5.543 .23a3.993 3.993 0 0 0 0 5.542a4.016 4.016 0 0 0 5.543 .23a1 1 0 0 0 -1.32 -1.502c-.81 .711 -2.035 .66 -2.783 -.116a1.993 1.993 0 0 1 0 -2.766a2.016 2.016 0 0 1 2.783 -.116a1 1 0 0 0 1.32 -1.501z" /></svg>';
                        }
                        ?>
                    </div>
                    <div>
                        <span class="text-dark d-block brand-logo"><?= ($setting->title == null ? 'Conteno CMS' : $setting->title) ?></span>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php foreach($pages as $data){ ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= Url::to(['pages', 'slug' => $data['slug']]) ?>"><?= $data['name'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>    
    <?= $content ?>

    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <?php 
                        if($setting->logo_footer != null){
                            echo Html::img('@web/uploads/'.$setting->logo_footer.'', ['style' => 'width:'.$setting->logo_footer_width.';']);
                        }else{
                            echo '<svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="#475569"  class="icon icon-tabler icons-tabler-filled icon-tabler-copyright"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-2.34 5.659a4.016 4.016 0 0 0 -5.543 .23a3.993 3.993 0 0 0 0 5.542a4.016 4.016 0 0 0 5.543 .23a1 1 0 0 0 -1.32 -1.502c-.81 .711 -2.035 .66 -2.783 -.116a1.993 1.993 0 0 1 0 -2.766a2.016 2.016 0 0 1 2.783 -.116a1 1 0 0 0 1.32 -1.501z" /></svg>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
