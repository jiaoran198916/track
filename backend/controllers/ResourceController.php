<?php

namespace backend\controllers;

use Yii;
use common\models\Resource;
use common\models\ResourceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * ResourceController implements the CRUD actions for Resource model.
 */
class ResourceController extends Controller
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
     * Lists all Resource models.
     * @return mixed
     */
    public function actionIndex()
    {

        $params = Yii::$app->request->queryParams;

        if(is_array($params) && array_key_exists('id', $params)){
            $params['movie_id'] = $params['id'];
            unset($params['id']);
            unset($params['r']);
//            Episode::$movie_id =  $params['movie_id'];
        }
        //echo Episode::$movie_id;die;
        $query = Resource::find();
        $query->where($params);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'movie_id' => $params['movie_id']
        ]);
    }

    /**
     * Displays a single Resource model.
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
     * Creates a new Resource model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resource();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $item_id = Yii::$app->request->get('item_id');
        $type = Yii::$app->request->get('type');
        if($id){
            $model = Resource::findOne($id);
            $item_id = $model->item_id;
            $type = $model->type;
        }else{
            $model = new Resource();
            $model->is_download = 0;
        }

        $this->layout = 'main_ajax';

        return $this->render('/movie/res_form', [
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
        if(isset($params['Resource']['id']) && $params['Resource']['id']){
            $model = Resource::findOne($params['Resource']['id']);
        }else{
            $model = $model = new Resource();
        }
        if ($model->load($params) && $model->save()) {
            return $this->renderJson('保存成功');
        } else {
            return $this->renderJson('保存失败'.json_encode($model->getErrors()), 500);

        }
    }


    public function renderJson($msg = '成功', $code = 200, $data = [])
    {
        $rsp = [
            'msg' => $msg,
            'code' => $code,
            'data' => $data,
        ];
        return json_encode($rsp);
    }

    public function actionDel()
    {
        $id = Yii::$app->request->post('id');

        $model = Resource::findOne($id);
        $model->valid = 2;
        if($model->save()){
            return $this->renderJson('删除成功');
        }

        return $this->renderJson('删除失败');
    }

    /**
     * Updates an existing Resource model.
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
     * Deletes an existing Resource model.
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
     * Finds the Resource model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resource the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
