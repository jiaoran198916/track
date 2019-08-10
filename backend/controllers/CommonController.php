<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * CommonController
 */
class CommonController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        // 多语言
        Yii::$app->language = isset($_COOKIE['language']) && $_COOKIE['language'] == 'en' ? 'en' : 'zh-CN';
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    public function renderJson($data, $msg='成功', $code=200)
    {
        $params = [
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ];
        return json_encode($params);
    }




}
