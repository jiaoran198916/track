<?php

namespace backend\controllers;

use common\models\ItemMovieRelation;
use Yii;
use common\models\Awardsitem;
use common\models\AwardsitemSearch;
use yii\web\NotFoundHttpException;

/**
 * AwardsitemController implements the CRUD actions for Awardsitem model.
 */
class AwardsitemController extends CommonController
{

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/uploads/image/awards/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ]
        ];
    }

    /**
     * Lists all Awardsitem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AwardsitemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Awardsitem model.
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
     * Creates a new Awardsitem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $params = Yii::$app->request->post();

        if(isset($params['Awardsitem']['id']) && $params['Awardsitem']['id'] > 0){
            $model = $this->findModel($params['Awardsitem']['id']);
            unset($params['Awardsitem']['id']);
        }else{
            $model = new Awardsitem();
        }

        if ($model->load($params) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionAddHit()
    {
        $id = Yii::$app->request->get('id');
        $item_id = Yii::$app->request->get('item_id');
        $type = Yii::$app->request->get('type');
        if($id){
            $model = ItemMovieRelation::findOne($id);
            $item_id = $model->item_id;
            $type = $model->type;
        }else{
            $model = new ItemMovieRelation();
            $model->is_hit = 0;
        }

        $this->layout = 'main_ajax';

        return $this->render('/awardsitem/hit_form', [
            'model' => $model,
            'item_id' => $item_id,
            'type' => $type
        ]);
    }

    public function actionDoadd()
    {
        $params = Yii::$app->request->post();
//        $id = Yii::$app->request->post('id', 0);
//        print_r($post);die;
        if(isset($params['ItemMovieRelation']['id']) && $params['ItemMovieRelation']['id']){
            $model = ItemMovieRelation::findOne($params['ItemMovieRelation']['id']);
        }else{
            $model = $model = new ItemMovieRelation();
        }
        if ($model->load($params) && $model->save()) {
            return $this->renderJson('保存成功');
        } else {
            return $this->renderJson('保存失败'.json_encode($model->getErrors()), 500);

        }
    }

    public function actionDel()
    {
        $id = Yii::$app->request->post('id');

        $model = ItemMovieRelation::findOne($id);
        $model->valid = 2;
        if($model->save()){
            return $this->renderJson('删除成功');
        }
        return $this->renderJson('删除失败');
    }

    /**
     * Updates an existing Awardsitem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Awardsitem model.
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
     * Finds the Awardsitem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Awardsitem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Awardsitem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
