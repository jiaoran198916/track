<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Type */

$this->title = '新建类型';
$this->params['breadcrumbs'][] = ['label' => '类型列表', 'url' => ['index']];
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
