<?php

namespace frontend\controllers;

use common\models\Banner;
use Yii;
use common\models\Movie;
use common\models\MovieSearch;
use common\models\Episode;
use common\models\Post;
use common\models\User;
use common\models\Tag;
use common\models\Comment;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MovieController implements the CRUD actions for Movie model.
 */
class MovieController extends Controller
{
    public $added = 0;
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
    public function actionIndex1()
    {
        $tags=Tag::findTagWeights();
        $recentComments=Comment::findRecentComments();

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tags'=>$tags,
            'recentComments'=>$recentComments,
        ]);
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
//        print_r(Yii::$app->request->queryParams);die;
        $dataProvider->pagination = [
            'pageSize' => 10,
        ];
        $keyword = '';
        $view = 'index';
        if(!empty(Yii::$app->request->queryParams) && isset(Yii::$app->request->queryParams['MovieSearch']['name'])){
            $keyword = Yii::$app->request->queryParams['MovieSearch']['name'];
            $view = 'list';
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
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
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
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
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
        //step1. 准备数据模型
        $model = $this->findModel($id);
        $tags=Tag::findTagWeights();

        $news = Movie::findNewTen();
        $hots = Movie::findHotTen();



//        print_r($model);die;
//        echo Movie::find()->count();die;
        $randomData = Movie::getRandomData();

        //step3.传数据给视图渲染

        return $this->render('detail',[
            'model'=>$model,
            'news'=>$news,
            'hots'=>$hots,
            'added'=>$this->added,
            'randomData'=>$randomData
        ]);

    }
}
