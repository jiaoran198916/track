<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Movie;
use common\models\Resource;
use Yii;
use common\models\Master;
use common\models\MasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterController implements the CRUD actions for Movie model.
 */
class MasterController extends Controller
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
     * Lists all Master models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $bannerModel = Banner::getBannerData();
        $dataProvider->pagination = [
            'pageSize' => 6,
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
            'keyword' => $keyword
        ]);
    }



    /**
     * Finds the Master model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Master the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Master::findOne($id)) !== null) {
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

        return $this->render('detail',[
            'model'=>$model,
            'news'=>$news,
            'hots'=>$hots,
        ]);

    }
}
