<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = '修改电影';
$this->params['breadcrumbs'][] = ['label' => '电影列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Main content -->
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
