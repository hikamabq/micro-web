<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $posts = Yii::$app->db->createCommand('SELECT * FROM test')->queryAll();
        return $this->render('index', [
            'posts' => $posts
        ]);
    }
}