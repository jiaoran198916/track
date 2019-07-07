<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Poststatus;
use common\models\Adminuser;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author_id')->dropDownList(Adminuser::find()->select(['nickname', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者']) ?>
    <?= $form->field($model, 'type')->dropDownList(\common\models\Post::postType(),['prompt' => '请选择类型']) ?>
</div>

<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
    <?= Html::a('取 消',['index'], ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
