<?php

namespace backend\controllers;

use Yii;
use common\models\Episode;
use common\models\EpisodeSearch;
use yii\web\NotFoundHttpException;


/**
 * EpisodeController implements the CRUD actions for Episode model.
 */
class EpisodeController extends CommonController
{

    /**
     * Lists all Episode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EpisodeSearch();
        $searchModel->valid = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $post = Yii::$app->request->post();
        if(!empty($post)){
            print_r($post);//die;
        }
        $movie_id = Yii::$app->request->get('movie_id');

        $post['Episode']['musician_id'] = implode(',', $post['Episode']['musician_id']);


        if ($model->load($post) && $model->save()) {
            return $this->redirect(['movie/view', 'id' => $model->movie_id]);
        } else {
            $model->movie_id = $movie_id;
//            print_r($model->getErrors());die;
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }


    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $movie_id = Yii::$app->request->get('movie_id');
        if($id){
            $model = $this->findModel($id);
            $movie_id = $model->movie_id;
        }else{
            $model = new Episode();
        }

        $this->layout = 'main_ajax';

        return $this->render('/movie/epi_form', [
            'model' => $model,
            'movie_id' => $movie_id
        ]);
    }

    public function actionDoadd()
    {
        $params = Yii::$app->request->post();
//        $id = Yii::$app->request->post('id', 0);
//        print_r($post);die;
        if(isset($params['Episode']['id']) && $params['Episode']['id']){
            $model = Episode::findOne($params['Episode']['id']);
        }else{
            $model = $model = new Episode();
        }
        if(isset($params['Episode']['musician_id']) && !empty($params['Episode']['musician_id']) && is_array($params['Episode']['musician_id'])){
            $params['Episode']['musician_id'] = implode(',', $params['Episode']['musician_id']);
        }

        if ($model->load($params) && $model->save()) {
            return $this->renderJson('保存成功');
        } else {
            return $this->renderJson('保存失败'.json_encode($model->getErrors()), 500);

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
//            print_r($model->getErrors());die;
            return $this->render('create', [
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
            return $this->renderJson('删除成功');
        }

        return $this->renderJson('删除失败');
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
