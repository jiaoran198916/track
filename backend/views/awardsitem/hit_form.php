<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Master;
use common\models\User;
use common\models\Source;
use yii\grid\GridView;

?>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form', 'id' => 'hit']]); ?>
<div class="box-body">
    <input type="hidden" name="ItemMovieRelation[item_id]" id="item-item_id" value="<?= $item_id ?>">
    <input type="hidden" name="ItemMovieRelation[type]" id="item-type_id" value="<?= $type ?>">
    <input type="hidden" name="ItemMovieRelation[id]" id="item-id" value="<?= $model->id ?>">

    <?= $form->field($model, 'is_hit')->radioList([0 => '提名', 1 => '获奖'])->label('获奖') ?>

    <?= $form->field($model, 'movie_id')->dropDownList(\common\models\Movie::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'data-placeholder' => "选择电影"]) ?>
</div>
<div class="box-footer">
    <button type="button" class="btn btn-success" onclick="doAdd()"> 确定</button>
</div>
<?php ActiveForm::end(); ?>

<script>

    function doAdd(){
        var url = '/awardsitem/doadd';
        var data = $('#hit').serialize();
        $.post(url, data, function (rsp) {
            layer.open({
                content:rsp.msg,
                yes:function () {
                    if(rsp.code === 200){
                        parent.layer.closeAll()
                        parent.location.reload()
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

