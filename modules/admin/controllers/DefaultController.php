<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\media\Media;
use app\modules\admin\models\pages\Pages;
use app\modules\admin\models\posts\Posts;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $posts = Posts::find()->count();
        $pages = Pages::find()->count();
        $media = Media::find()->count();
        return $this->render('index', [
            'posts' => $posts,
            'pages' => $pages,
            'media' => $media,
        ]);
    }
}