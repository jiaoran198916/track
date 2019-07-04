<?php

namespace backend\controllers;

use Yii;
use common\models\Episode;
use common\models\EpisodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * EpisodeController implements the CRUD actions for Episode model.
 */
class EpisodeController extends Controller
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

    /**
     * Lists all Episode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->queryParams;

        if(is_array($params) && array_key_exists('id', $params)){
            $params['movie_id'] = $params['id'];
            unset($params['id']);
            unset($params['r']);
            Episode::$movie_id =  $params['movie_id'];
        }
        //echo Episode::$movie_id;die;
        $query = Episode::find();
        $query->where($params);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//        print_r($query);die();

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'movie_id' => $params['movie_id']
        ]);
    }

    /**
     * Displays a single Episode model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Episode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Episode();
//        print_r($model);die;
        //echo Episode::$movie_id;die;
        $post = Yii::$app->request->post();
        if(!empty($post)){
            print_r($post);//die;
        }
        $movie_id = Yii::$app->request->get('movie_id');
        //$post['Episode']['movie_id'] = $movie_id;

        $post['Episode']['musician_id'] = implode(',', $post['Episode']['musician_id']);


        if ($model->load($post) && $model->save()) {
//            return json_encode(['code' => 200, 'data' => $model->id]);
            return $this->redirect(['movie/view', 'id' => $model->movie_id]);
        } else {
            $model->movie_id = $movie_id;
            print_r($model->getErrors());die;
            return $this->render('create', [
                'model' => $model,
                //'movie_id' => $movie_id
            ]);
        }
    }


    public function actionModify()
    {
        $post = Yii::$app->request->post();
//        $id = Yii::$app->request->post('id', 0);
//        print_r($post);die;
        $model = $this->findModel($post['Episode']['id']);

        $post['Episode']['musician_id'] = implode(',', $post['Episode']['musician_id']);


        if ($model->load($post) && $model->save()) {
//            return json_encode(['code' => 200, 'data' => $model->id]);
            return $this->redirect(['movie/view', 'id' => $model->movie_id]);
        } else {
            print_r($model->getErrors());die;
            return $this->render('create', [
                'model' => $model,
                //'movie_id' => $movie_id
            ]);
        }
    }

    /**
     * Updates an existing Episode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Episode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDel()
    {
        $id = Yii::$app->request->post('id');

        $model = Episode::findOne($id);
        $model->valid = 2;
        if($model->save()){
            return json_encode(['code' => 200, 'data' => $model->movie_id]);
        }

        return json_encode(['code' => 500, 'data' => $model->getErrors()]);
    }

    /**
     * Finds the Episode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Episode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Episode::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
