<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\base\DynamicModel;
use yii\data\SqlDataProvider;
use yii\web\Controller;

class ComponentsController extends Controller
{
    public function actionIndex()
    {
        $posts = [
            'title' => 'Judul artikel pertama',
            'subtitle' => 'ini adalah subtitle dari artikel pertama',
            'slug' => 'judul-artikel-pertama',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae maiores magnam vitae quia amet esse voluptate nesciunt, eius nulla laborum aspernatur itaque voluptatem fuga! Harum excepturi accusantium ratione fugit deleniti.',
            'cover_image' => 'https://acspeduli.org/uploads/341237551.jpeg',
        ];
        return $this->render('index', [
            'posts' => $posts
        ]);
    }
}