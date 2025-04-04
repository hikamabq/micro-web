<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        // $posts = Yii::$app->db->createCommand('SELECT * FROM posts')->queryAll();
        $posts = [
            [
                'title' => 'judul 1',
                'content' => 'ini judul saya'
            ],
            [
                'title' => 'judul 2',
                'content' => 'ini judul saya'
            ]
        ];
        return $this->render('index', [
            'posts' => $posts
        ]);
    }
}