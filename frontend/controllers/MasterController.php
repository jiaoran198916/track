<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Movie;
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

        if(isset(Yii::$app->request->queryParams['char'])){     //按字母筛选
            $keyword = Master::getChar(Yii::$app->request->queryParams['char']);
            $composersList = Master::getComposers($keyword ? $keyword : '');
        } elseif(isset(Yii::$app->request->queryParams['MasterSearch']['name'])){   //关键字搜索
            $searchModel = new MasterSearch();
            $params = Yii::$app->request->queryParams;
            $params['MasterSearch']['type'] = 0;
            $dataProvider = $searchModel->search($params);
            $composersList = $dataProvider->getModels();
        }else{  //默认展示最近修改的，含图片
            $composersList = Master::getComposers();
        }

        return $this->render( 'index', [
            'composersList' => $composersList,
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


    public function actionView($id)
    {
        $this->layout = 'main1';
        $model = $this->findModel($id);
        $news = Movie::findNewTen();
        $hots = Movie::findHotTen();

        return $this->render('view',[
            'model'=>$model,
            'news'=>$news,
            'hots'=>$hots,
        ]);

    }
}
