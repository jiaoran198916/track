<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Adminuser;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$model = Adminuser::findOne($id);

$this->title = '权限设置';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">管理员：<?= $model->username?></h3>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="box-body">

            <label>操作：</label>
        <ul class=" inline">

        <?= Html::checkboxList('newPri',$AuthAssignmentArray,$allPrivilegesArray);?>

        </ul>
        </div>
        <div class="box-footer">
            <?= Html::submitButton('设 置', ['class' => 'btn btn-success'] ) ?>
            <?= Html::a('取 消', ['index'] ,['class' => 'btn btn-default'] ) ?>
        </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
</section>



