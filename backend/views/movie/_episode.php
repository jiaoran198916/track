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
        <th>定位</th>
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
        <tr>
        <td><?= $e->id ?></td>
        <td><?= $e->timing ?></td>
        <td><?= $e->name ?></td>
        <td><?= $e->foreign_name ?></td>
        <td><?= $e->movie->name ?></td>
        <td><?= $e->singer->name ?></td>
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

