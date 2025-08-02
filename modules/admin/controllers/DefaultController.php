<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $posts = Yii::$app->db->createCommand('SELECT * FROM users')->queryAll();
        return $this->render('index', [
            'posts' => $posts
        ]);
    }
}