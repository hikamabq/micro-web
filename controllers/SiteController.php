<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\pages\Pages;
use app\models\posts\Posts;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
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
    public function actionPages($slug)
    {
        $pages = Pages::findOne(['slug' => $slug]);
        if(empty($pages) ){
            return $this->redirect(['index']);
        }
        $model = Posts::find()->joinWith(['page'])->where(['id_pages' => $pages->id])->orderBy(['id' => SORT_DESC])->all();
        return $this->render(''.$pages->layout.'', [
            'pages' => $pages,
            'model' => $model,
        ]);
    }
    public function actionRead($slug)
    {
        $model = Posts::find()->joinWith(['page'])->where(['posts.slug' => $slug])->one();
        if(empty($model)){
            return $this->redirect(['index']);
        }
        $other = Posts::find()->joinWith(['page'])->where(['not', ['posts.slug' => $slug]])->andWhere(['id_pages' => $model->id_pages])->limit(10)->all();
        return $this->render('detail', [
            'model' => $model,
            'other' => $other,
        ]);
    }
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['admin/default']);
        }

        $model->password = '';
        $this->layout = 'auth';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}