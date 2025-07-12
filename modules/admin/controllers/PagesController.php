<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\base\DynamicModel;
use yii\data\SqlDataProvider;
use yii\web\Controller;

class PagesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}