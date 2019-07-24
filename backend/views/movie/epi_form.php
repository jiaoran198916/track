<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Master;
use common\models\User;
use common\models\Movie;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */

?>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form', 'id' => 'episode']]); ?>
<div class="box-body">
    <input type="hidden" name="Episode[movie_id]" id="episode-movie_id" value="<?= $movie_id ?>">
    <input type="hidden" name="Episode[id]" id="episode-id" value="<?= $model->id ?>">
    <?= $form->field($model, 'min')->input('number') ?>
    <?= $form->field($model, 'sec')->input('number') ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'ename')->textInput() ?>
    <?= $form->field($model, 'desc')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'musician_id')->dropDownList(Master::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择歌手"]) ?>
</div>
<div class="box-footer">
    <button type="button" class="btn btn-success" onclick="doAdd()"> 确定</button>
</div>
<?php ActiveForm::end(); ?>

<script>

    function doAdd(){
        var url = '/episode/doadd';
        var data = $('#episode').serialize();
        $.post(url, data, function (rsp) {
            layer.open({
                content:rsp.msg,
                yes:function () {
                    if(rsp.code == 200){
                        parent.layer.closeAll()
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

