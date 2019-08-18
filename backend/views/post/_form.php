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
<style>
    .fa-certificate{
        margin-left: 5px;
        font-size: 10px;
        color: red;
    }
</style>

<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <?= $form->field($model, 'name', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_id', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->dropDownList(\common\models\Cate::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'movie_id')->dropDownList(\common\models\Movie::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'content', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author_id')->dropDownList(Adminuser::find()->select(['nickname', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者']) ?>

</div>

<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
    <?= Html::a('取 消',['index'], ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
    window.onload = function(){
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    }

</script>
