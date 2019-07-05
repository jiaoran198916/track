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
        <th>ID</th>
        <th>名称</th>
        <th>描述</th>
        <th>链接</th>
        <th>排序</th>
        <th>关联</th>
        <th>在线</th>
        <th>来源</th>
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
                <td><?= $r->item->name ?></td>
                <td><?= $r->downloadStatus ?></td>
                <td><?= $r->source ?></td>
                <td>caozuo</td>

            </tr>

        <?php endforeach;?>
    <?php endif;?>
    </tbody>

</table>

<?php if(!empty($model->episodes)):?>
    <?php foreach ($model->episodes as $e): ?>
        <div>
            <div class="small-box bg-yellow" style="margin-bottom:0">
                <div class="inner">
                    <h3><?= $e->min ?><small style="margin-left: 50px;"><?= $e->name ?></small></h3>
                    <h1><span class="label label-primary pull-right"><?= count($e->resources) ?></span></h1>
                    <p> By <span><?= $e->musician->name ?></span></p>
                </div>
            </div>
            <table id="teaListTable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>描述</th>
                    <th>链接</th>
                    <th>排序</th>
                    <th>关联</th>
                    <th>在线</th>
                    <th>来源</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($e->resources)):?>
                    <?php foreach ($e->resources as $r): ?>
                        <tr>
                            <td><?= $r->id ?></td>
                            <td><?= $r->name ?></td>
                            <td><?= $r->desc ?></td>
                            <td><?= $r->url ?></td>
                            <td><?= $r->position ?></td>
                            <td><?= $r->item->name ?></td>
                            <td><?= $r->downloadStatus ?></td>
                            <td><?= $r->source ?></td>
                            <td>caozuo</td>

                        </tr>

                    <?php endforeach;?>
                <?php endif;?>
                </tbody>

            </table>
        </div>

    <?php endforeach;?>
<?php endif;?>





<script>
    window.onload = function(){

    }

</script>

