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
    <button type="button" class="btn btn-success" onclick="addEpisode(0, <?= $model->id?>)"><i class="fa fa-plus"></i> 新增片段</button>
</p>
<table id="episodeListTable" class="table table-bordered table-striped">
    <thead>
    <tr>
<!--        <th><input id="checkall" type="checkbox" onclick="checkall()"/></th>-->
        <th>#</th>
        <th>定位(分秒)</th>
        <th>名称</th>
        <th>原名</th>
        <th>歌手</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($model->episodes)):?>
    <?php foreach ($model->episodes as $i=>$e): ?>
        <tr>
        <td><?= ($i +1) ?></td>
        <td><?= $e->location ?></td>
        <td><?= $e->name ?></td>
        <td><?= $e->ename ?></td>
        <td><?= $e->musicians ?></td>
        <td>

            <a href='javascript:addEpisode(<?=$e->id ?>, <?=$e->movie_id ?>)' title="修改" aria-label="修改" ><span class="glyphicon glyphicon-edit"></span></a>
            <a href="javascript:delEpi(<?= $e->id ?>)" title="删除" aria-label="删除"><span class="glyphicon glyphicon-trash"></span></a>
        </td>

        </tr>
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
                <?= $form->field($episodeModel, 'ename')->textInput() ?>
                <?= $form->field($episodeModel, 'desc')->textarea(['rows' => 2]) ?>

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

    function addEpisode(id, movie_id){
        var title = (id > 0)? '修改音乐片段' : '新增音乐片段';
        layer.open({
            title:title,
            type:2,
            area: ['600px', '600px'],
            content: '/episode/add/?movie_id='+movie_id+'&id='+id,
        })
    }

    function delEpi(id) {
        layer.confirm('确定要删除？', {
            btn: ['确认','取消'], //按钮
            shade: false //不显示遮罩
        }, function(){
            $.post('/episode/del', {id: id}, function(rsp){
                layer.alert(rsp.msg, function () {
                    if(rsp.code === 200){
                        location.reload()
                    }
                })
            }, 'json');
        }, function(){});
    }

    window.onload = function(){
        $(function () {
            $('#episodeListTable').DataTable({
                "iDisplayLength" : 50,
                "order": [[ 0, "desc" ]]
            })
        })
    }

</script>

