<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Master;
use common\models\User;
use common\models\Source;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */

?>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form', 'id' => 'resource']]); ?>
<div class="box-body">
    <input type="hidden" name="Resource[item_id]" id="resource-movie_id" value="<?= $item_id ?>">
    <input type="hidden" name="Resource[type]" id="resource-movie_id" value="<?= $type ?>">
    <input type="hidden" name="Resource[id]" id="resource-id" value="<?= $model->id ?>">
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'desc')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'position')->input('number') ?>
    <?= $form->field($model, 'url')->textInput() ?>
    <?= $form->field($model, 'is_download')->radioList([0 => '在线', 1 => '下载'])->label('类型') ?>

    <?= $form->field($model, 'source_id')->dropDownList(Source::find()->select(['cname', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'data-placeholder' => "选择来源"]) ?>
</div>
<div class="box-footer">
    <button type="button" class="btn btn-success" onclick="doAdd()"> 确定</button>
</div>
<?php ActiveForm::end(); ?>

<script>

    function doAdd(){
        var url = '/resource/doadd';
        var data = $('#resource').serialize();
        $.post(url, data, function (rsp) {
            layer.open({
                content:rsp.msg,
                yes:function () {
                    if(rsp.code === 200){
                        parent.layer.closeAll()
                        location.reload()
                    }else{
                        layer.closeAll()
                    }
                }
            })
        }, 'json')
    }

    window.onload = function(){
        $('.select2').select2()
    }

</script>

