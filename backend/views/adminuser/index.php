<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1"><?= $this->title ?></span>
    </div>
    <div class="mws-panel-body">

        <div class="mws-panel-toolbar top clearfix">
            <ul>
                <li><?= Html::a('New', ['create'], ['class' => 'mws-ic-16 ic-accept']) ?></li>
                <li><a href="#" class="mws-ic-16 ic-cross">Reject</a></li>
                <li><a href="#"dataTables_length class="mws-ic-16 ic-printer">Print</a></li>
                <li><a href="#" class="mws-ic-16 ic-arrow-refresh">Renew</a></li>
                <li><a href="#" class="mws-ic-16 ic-edit">Update</a></li>
            </ul>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'mws-datatable-fn mws-table'],
        'layout' => '{items}',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'nickname',
//            'password',
//            'auth_key',
            // 'password_hash',
            // 'password_reset_token',
             'email:email',
            // 'profile:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{resetpwd}{privilege}',
                'buttons' => [
                    'view' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',

                        ];
                        return Html::a('<li class="mws-ic-16 ic-eye"></li>', $url, $options);
                    },
                    'update' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',

                        ];
                        return Html::a('<li class="mws-ic-16 ic-edit"></li>', $url, $options);
                    },
                    'resetpwd' => function($url, $model, $key){
                        $options = [
                                'title' => Yii::t('yii','重置密码'),
                                'aria-label' => Yii::t('yii','重置密码'),
                                'data-pjax' => '0',
                        ];
                        return Html::a('<li class="mws-ic-16 ic-lock"></li>',$url ,$options);

                    },
                    'privilege' => function($url, $model, $key){
                        $options = [
                            'title' => Yii::t('yii','权限'),
                            'aria-label' => Yii::t('yii','权限'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<li class="mws-ic-16 ic-status-online"></li>',$url ,$options);

                    }
                ]
            ],
        ],
    ]); ?>
</div>
</div>
