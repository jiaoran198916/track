<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = '新增电影';
$this->params['breadcrumbs'][] = ['label' => '电影列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
<!-- general form elements -->
        <div class="box box-primary">

        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    <!-- /.box-body -->
        </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
<!-- /.content -->
