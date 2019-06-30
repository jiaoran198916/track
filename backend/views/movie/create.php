<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = '新增电影';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            电影管理
            <small>新增电影</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">新增电影</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>

    </section>

</div>
