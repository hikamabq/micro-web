<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\settings\Settings;
use app\modules\admin\models\settings\SettingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SettingsController implements the CRUD actions for Settings model.
 */
class SettingsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Settings models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = $this->findModel(1);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Settings model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Settings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Settings();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Settings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $gambar_lama = $model->logo_header;
        $gambar_lama2 = $model->logo_footer;

        if ($this->request->isPost && $model->load($this->request->post()) ) {
            if ($model->logo_header == null) {
                $model->logo_header = $gambar_lama;
            }
            if ($model->logo_footer == null) {
                $model->logo_footer = $gambar_lama2;
            }
            $upload = UploadedFile::getInstance($model, 'logo_header');
            $upload2 = UploadedFile::getInstance($model, 'logo_footer');
            $name_file = rand();
            $name_file2 = rand();
            if (!empty($upload)) {
                $upload->saveAs('uploads/' . $name_file . '.' . $upload->extension);
                $model->logo_header = $name_file . '.' . $upload->extension;
            }
            if (!empty($upload2)) {
                $upload2->saveAs('uploads/' . $name_file2 . '.' . $upload2->extension);
                $model->logo_footer = $name_file2 . '.' . $upload2->extension;
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Settings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Settings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Settings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Settings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
