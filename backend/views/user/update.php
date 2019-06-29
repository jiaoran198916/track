<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '修改用户资料: ' . $model->username;

?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil"><?= $this->title ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
