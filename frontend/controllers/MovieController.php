<?php

namespace frontend\controllers;

use common\models\Banner;
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

    /**
     * Lists all Movie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $bannerModel = Banner::getBannerData();
        $news = Movie::findNewTen();
        $hots = Movie::findHotTen();
        $dataProvider->pagination = [
            'pageSize' => 12,
        ];
        $keyword = '';
        $view = 'index';
        if(!empty(Yii::$app->request->queryParams) && isset(Yii::$app->request->queryParams['MovieSearch']['name'])){
            $keyword = Yii::$app->request->queryParams['MovieSearch']['name'];
//            $view = 'list';
        }
        return $this->render( $view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bannerData' => $bannerModel,
            'news' => $news,
            'hots' => $hots,
            'keyword' => $keyword
        ]);
    }


    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movie();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
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

    public function actionDetail($id)
    {
        $model = $this->findModel($id);

        $news = Movie::findNewTen();
        $hots = Movie::findHotTen();

        //访问数+1
        $model->updateCounters(['count' => 1]);

        return $this->render('detail',[
            'model'=>$model,
            'news'=>$news,
            'hots'=>$hots
        ]);

    }
}
