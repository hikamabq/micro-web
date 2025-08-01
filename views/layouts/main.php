<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\pages\Pages;
use app\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
$pages = Pages::find()->all();

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
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <a class="navbar-brand" href="#"> 
                <img src="<?= Url::to('@web/logo.svg') ?>" width="25px" alt=""> Hicome CMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= Url::to('/home') ?>">Home</a>
                    </li>
                    <?php foreach($pages as $data){ ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= Url::to('/'.$data['slug']) ?>"><?= $data['name'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>    
    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
