<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\MasterSearch;
use common\models\Movie;
use common\models\Resource;
use Yii;
use common\models\Awards;
use common\models\AwardsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AwardsController implements the CRUD actions for Movie model.
 */
class AwardsController extends Controller
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
     * Lists all Awards models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AwardsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $news = Movie::findNewTen();
        $hots = Movie::findHotTen();
        $dataProvider->pagination = [
            'pageSize' => 6,
        ];
        $view = 'index';

        return $this->render( $view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'news' => $news,
            'hots' => $hots,
        ]);
    }



    /**
     * Finds the Awards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Awards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Awards::findOne($id)) !== null) {
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
