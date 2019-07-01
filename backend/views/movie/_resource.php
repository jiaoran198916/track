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
    <button type="button" class="btn btn-normal" onclick="toAddPage()" >新增</button>
    <button type="button" class="btn btn-danger" onclick="delType()">删除</button>
</p>
<table id="teaListTable" class="table table-bordered table-striped">
    <thead>
    <tr>
        <!--        <th><input id="checkall" type="checkbox" onclick="checkall()"/></th>-->
        <th>ID</th>
        <th>名称</th>
        <th>描述</th>
        <th>链接</th>
        <th>排序</th>
        <th>电影</th>
        <th>状态</th>
        <th>类型</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($model->resources)):?>
        <?php foreach ($model->resources as $r): ?>
            <tr>
                <td><?= $r->id ?></td>
                <td><?= $r->name ?></td>
                <td><?= $r->desc ?></td>
                <td><?= $r->url ?></td>
                <td><?= $r->position ?></td>
                <td><?= $r->movie->name ?></td>
                <td><?= $r->statusName ?></td>
                <td><?= $r->typeName ?></td>
                <td>caozuo</td>

            </tr>

        <?php endforeach;?>
    <?php endif;?>
    </tbody>

</table>



<script>
    window.onload = function(){
        $(function () {
            $('#teaListTable').DataTable({
                "dom": 'l <"div.toolbar"> tip',
                'lengthChange': false,
            });


        })
    }

</script>

