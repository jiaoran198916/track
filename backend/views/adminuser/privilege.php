<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Adminuser;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$model = Adminuser::findOne($id);

$this->title = '权限设置: ' . $model->username;

?>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil"><?= $this->title ?></span>
    </div>

    <div class="mws-panel-body">

        <?php $form = ActiveForm::begin(['options' => ['class' => 'mws-form']]); ?>
        <div class="mws-form-inline">
        <div class="mws-form-row">
            <label>操作：</label>
        <div class="mws-form-item clearfix">


        <ul class="mws-form-list inline">

        <?= Html::checkboxList('newPri',$AuthAssignmentArray,$allPrivilegesArray);?>

        </ul>
        </div>
        <div class="mws-button-row" style="text-align:left">
            <input type="submit" value="设 置" class="mws-button green">
            <?= Html::a(Html::button('取 消',['class' => 'mws-button gray']), ['index'] ) ?>
        </div>
    </div>
    </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>



