<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\MasterSearch;
use common\models\Movie;
use common\models\Resource;
use Yii;
use common\models\Awardsitem;
use common\models\AwardsitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AwardsitemController implements the CRUD actions for Movie model.
 */
class AwardsitemController extends Controller
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
