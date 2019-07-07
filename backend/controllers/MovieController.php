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
class MovieController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
        $model = new Movie();
        //print_r(Yii::$app->request->post());die;

        $params = Yii::$app->request->post();
        if($params){
            $params['Movie']['musician_id'] = implode(',', $params['Movie']['musician_id']);
            $params['Movie']['director_id'] = implode(',', $params['Movie']['director_id']);
            $params['Movie']['actor_id'] = implode(',', $params['Movie']['actor_id']);
        }

        if ($model->load($params) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        $model = $this->findModel($id);

        $params = Yii::$app->request->post();
        if($params){
            $params['Movie']['musician_id'] = implode(',', $params['Movie']['musician_id']);
            $params['Movie']['director_id'] = implode(',', $params['Movie']['director_id']);
            $params['Movie']['actor_id'] = implode(',', $params['Movie']['actor_id']);
        }

        if ($model->load($params) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $model->musician_id = strpos($model->musician_id, ',') ? explode(',', $model->musician_id): $model->musician_id;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Edit an existing Movie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionEdit($id)
    {
        return Yii::$app->runAction('episode/index',['id' => $id]);
    }

    /**
     * Edit an existing Movie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionConnect($id)
    {
        return Yii::$app->runAction('resource/index',['id' => $id]);
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
