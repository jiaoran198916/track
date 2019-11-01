<?php
namespace backend\controllers;

use common\models\Episode;
use common\models\Master;
use common\models\Movie;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\AdminLoginForm;

/**
 * Site controller
 */
class SiteController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $movieNum = Movie::find()->where('valid=1')->count();
        $masterNum = Master::find()->where('valid=1')->count();
        $userNum = User::find()->where('valid=1')->count();
        $episodeNum = Episode::find()->where('valid=1')->count();
        return $this->render('index',[
            'movieNum' => $movieNum,
            'masterNum' => $masterNum,
            'userNum' => $userNum,
            'episodeNum' => $episodeNum,
        ]);
    }

    public function actionLogin()
    {
//        echo 33;die;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
//        print_r(Yii::$app->request->post());die;

        $this->layout = 'login';
        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            echo 33;die;
            return $this->goBack();
        } else {
//            echo $this->layout;die;
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
