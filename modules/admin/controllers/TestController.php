<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\base\DynamicModel;
use yii\data\SqlDataProvider;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $count = Yii::$app->db->createCommand('
            SELECT COUNT(*) FROM test
        ')->queryScalar();
        
        $provider = new SqlDataProvider([
            'sql' => 'SELECT * FROM test',
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'name',
                    'phone',
                ],
            ],
        ]);
        
        // returns an array of data rows
        $dataProvider = $provider;
        return $this->render('index2', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionIndex2()
    {
        $posts = Yii::$app->db->createCommand('SELECT * FROM test')->queryAll();
        return $this->render('index', [
            'posts' => $posts
        ]);
    }

    public function actionCreate()
    {
        $model = new DynamicModel(['name', 'phone']);
        $model->addRule(['name', 'phone'], 'required')
              ->addRule('phone', 'string');
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->db->createCommand()->insert('test', [
                'name' => $model->name,
                'phone' => $model->phone,
            ])->execute();
            Yii::$app->session->setFlash('success', 'Data validated!');
            return $this->redirect(['index']);
        }
        
        return $this->render('_form', ['model' => $model]);
    }

}