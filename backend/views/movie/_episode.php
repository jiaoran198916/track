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
<p>
<button type="button" class="btn btn-default" onclick="toAddPage()">新增</button>
<button type="button" class="btn btn-danger" onclick="delType()">修改</button>
</p>
<table id="teaListTable" class="table table-bordered table-striped">
    <thead>
    <tr>
<!--        <th><input id="checkall" type="checkbox" onclick="checkall()"/></th>-->
        <th>ID</th>
        <th>定位(分秒)</th>
        <th>名称</th>
        <th>原名</th>
        <th>电影</th>
        <th>歌手</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($model->episodes)):?>
    <?php foreach ($model->episodes as $e): ?>
        <?php if($e->valid == 1):?>
        <tr>
        <td><?= $e->id ?></td>
        <td><?= $e->min .':'.$e->sec ?></td>
        <td><?= $e->name ?></td>
        <td><?= $e->foreign_name ?></td>
        <td><?= $e->movie->name ?></td>
        <td><?= $e->musicians ?></td>
        <td><a href="javascript:delEpi(<?= $e->id ?>)" title="删除" aria-label="删除" data-confirm="您确定要删除此项吗？"><span class="glyphicon glyphicon-trash"></span></a>
            <a href='javascript:modifyEpi(<?=json_encode(['movie_id' => $e->movie_id, 'id' => $e->id, 'min' => $e->min, 'sec' => $e->sec, 'name' => $e->name, 'foreign_name' => $e->foreign_name, 'musician_id' => $e->musician_id, 'summary' => $e->summary]) ?>)' title="修改" aria-label="修改" ><span class="glyphicon glyphicon-edit"></span></a>
        </td>

        </tr>
            <?php endif;?>
    <?php endforeach;?>
    <?php endif;?>
    </tbody>

</table>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">新增片段</h4>
            </div>
            <?php $form = ActiveForm::begin(['options' => ['role' => 'form', 'method' => 'post'], 'action' => \yii\helpers\Url::to(['episode/create'])]); ?>

            <div class="modal-body">

                <input type="hidden" name="Episode[movie_id]" id="episode-movie_id" value="<?= $model->id ?>">
                <input type="hidden" name="Episode[id]" id="episode-id" value="0">
                <?= $form->field($episodeModel, 'min')->input('number') ?>
                <?= $form->field($episodeModel, 'sec')->input('number') ?>
                <?= $form->field($episodeModel, 'name')->textInput() ?>
                <?= $form->field($episodeModel, 'foreign_name')->textInput() ?>
                <?= $form->field($episodeModel, 'summary')->textarea(['rows' => 2]) ?>

                <?= $form->field($episodeModel, 'musician_id')->dropDownList(Master::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择歌手"]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">确定</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    window.onload = function(){

        $(function () {
            function addEp(){
                var data = $("#w1").serialize();
                $.post('index.php?r=/episode/create', data, function (res) {
                    if(res.code === 200){
                        $.closeModal("modal-default");
                        dialog.success('添加成功', location.href + '#episode');
                    }else{
                        dialog.error('添加失败');
                    }
                }, 'json');
            }

        })
    }

</script>

