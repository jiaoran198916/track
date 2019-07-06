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
    <button type="button" class="btn btn-success" onclick="addResource(0, <?= $model->id?>, 1)"><i class="fa fa-plus"></i> 新增资源</button>
</p>
<table id="teaListTable" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>标题</th>
        <th>简介</th>
        <th>链接</th>
        <th>排序</th>
        <th>关联电影</th>
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
                <td><?= $r->sourceName->cname ?></td>
                <td>
                    <a href='javascript:addResource(<?=$r->id ?>, <?=$r->item_id ?>, <?=$r->type ?>)' title="修改" aria-label="修改" ><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="javascript:delRes(<?= $r->id ?>)" title="删除" aria-label="删除"><span class="glyphicon glyphicon-trash"></span></a>
                </td>

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
                    <h3><?= $e->min ?>:<?= $e->sec ?><small style="margin-left: 50px;"><?= $e->name ?></small>
                        <button type="button" class="btn btn-success pull-right" onclick="addResource(0, <?= $e->id?>, 0)"><i class="fa fa-plus"></i></button>
                    </h3>
                    <h3><span class="label label-primary pull-right"><?= count($e->resources) ?></span></h3>
                    <p> By <span><?= $e->musician->name ?></span></p>
                </div>
            </div>
            <table id="teaListTable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>简介</th>
                    <th>链接</th>
                    <th>排序</th>
                    <th>关联歌曲</th>
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
                            <td><?= $r->sourceName->cname ?></td>
                            <td>
                                <a href='javascript:addResource(<?=$r->id ?>, <?=$r->item_id ?>, <?=$r->type ?>)' title="修改" aria-label="修改" ><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="javascript:delRes(<?= $r->id ?>)" title="删除" aria-label="删除"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>

                        </tr>

                    <?php endforeach;?>
                <?php endif;?>
                </tbody>

            </table>
        </div>

    <?php endforeach;?>
<?php endif;?>


<script>
    function addResource(id, item_id, type){
        var title = (id > 0)? '修改电影资源' : '新增电影资源';
        layer.open({
            title:title,
            type:2,
            area: ['600px', '600px'],
            content: '/resource/add/?item_id='+item_id+'&id='+id+'&type='+type,
        })
    }

    function delRes(id) {
        layer.confirm('确定要删除？', {
            btn: ['确认','取消'], //按钮
            shade: false //不显示遮罩
        }, function(){
            $.post('/resource/del', {id: id}, function(rsp){
                layer.alert(rsp.msg, function () {
                    if(rsp.code === 200){
                        location.reload()
                    }
                })
            }, 'json');
        }, function(){});
    }

</script>

