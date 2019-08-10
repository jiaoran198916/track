<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Awardsitem */

$this->title = '新增电影节';
$this->params['breadcrumbs'][] = ['label' => '电影节列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</section>
