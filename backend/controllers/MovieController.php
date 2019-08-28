<?php

namespace backend\controllers;

use common\models\Episode;
use Yii;
use common\models\Movie;
use common\models\MovieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MovieController implements the CRUD actions for Movie model.
 */
class MovieController extends CommonController
{

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/uploads/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ]
        ];
    }

    /**
     * Lists all Movie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $this->layout = false;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Movie model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->musician_id = strpos($model->musician_id, ',') !== false ? explode(',', $model->musician_id): $model->musician_id;
        $model->director_id = strpos($model->director_id, ',') !== false ? explode(',', $model->director_id): $model->director_id;
        return $this->render('view', [
            'model' => $model,
            'episodeModel' => new Episode(),
        ]);
    }

    /**
     * Creates a new Movie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $params = Yii::$app->request->post();

        if(isset($params['Movie']['id']) && $params['Movie']['id'] > 0){
            $model = $this->findModel($params['Movie']['id']);
            unset($params['Movie']['id']);
        }else{
            $model = new Movie();
            $model->status = 1;
            //取库里的默认值
//            $model->loadDefaultValues();
        }
        if ($model->load($params) && Yii::$app->request->isAjax) {
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($model);
        }
        if($params){
            if(isset($params['Movie']['musician_id']) && !empty($params['Movie']['musician_id'])){
                $params['Movie']['musician_id'] = implode(',', $params['Movie']['musician_id']);
            }
            if(isset($params['Movie']['director_id']) && !empty($params['Movie']['director_id'])){
                $params['Movie']['director_id'] = implode(',', $params['Movie']['director_id']);
            }
        }

        if ($model->load($params) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Movie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $params = Yii::$app->request->post();
        if(!isset($id)){
            $id = $params['Movie']['id'];
        }
        $model = $this->findModel($id);
        if ($model->load($params) && Yii::$app->request->isAjax) {
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($model);
        }

        if($params){
            if(isset($params['Movie']['musician_id']) && !empty($params['Movie']['musician_id'])){
                $params['Movie']['musician_id'] = implode(',', $params['Movie']['musician_id']);
            }
            if(isset($params['Movie']['director_id']) && !empty($params['Movie']['director_id'])){
                $params['Movie']['director_id'] = implode(',', $params['Movie']['director_id']);
            }
        }

        if ($model->load($params) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $model->musician_id = strpos($model->musician_id, ',') !== false ? explode(',', $model->musician_id): $model->musician_id;
            $model->director_id = strpos($model->director_id, ',') !== false ? explode(',', $model->director_id): $model->director_id;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Movie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Movie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
