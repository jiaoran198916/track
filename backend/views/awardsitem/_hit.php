<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Master;
use common\models\User;
use common\models\Movie;
use yii\grid\GridView;

//print_r($model->awardsItemHit);die;

?>



<?php if(!empty($model->awardsItemHit)):?>
    <?php foreach ($model->awardsItemHit as $e): ?>
        <div>
            <div class="small-box bg-yellow" style="margin-bottom:0">
                <div class="inner">
                    <h3><?= $e['id'] ?><small style="margin-left: 50px;"><?= $e['name'] ?></small>
                        <button type="button" class="btn btn-success pull-right" onclick="addHit(0, <?= $model->id?>, <?= $e['id']?>)"><i class="fa fa-plus"></i></button>
                    </h3>
                </div>
            </div>
            <table id="teaListTable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>电影名</th>
                    <th>提名/获奖</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($e['hit'])):?>
                    <?php foreach ($e['hit'] as $r): ?>
                        <tr>
                            <td><?= $r->id ?></td>
                            <td><?= $r->movie->name ?></td>
                            <td><?= $r->hitText ?></td>
                            <td>
                                <a href='javascript:addHit(<?=$r->id ?>, <?= $model->id?>, <?= $e['id']?>)' title="修改" aria-label="修改" ><span class="glyphicon glyphicon-edit"></span></a>
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
    function addHit(id, item_id, type){
        var title = (id > 0)? '修改获奖电影' : '新增获奖电影';
        layer.open({
            title:title,
            type:2,
            area: ['600px', '600px'],
            content: '/awardsitem/add-hit/?item_id='+item_id+'&id='+id+'&type='+type,
        })
    }

    function delRes(id) {
        layer.confirm('确定要删除？', {
            btn: ['确认','取消'], //按钮
            shade: false //不显示遮罩
        }, function(){
            $.post('/awardsitem/del', {id: id}, function(rsp){
                layer.alert(rsp.msg, function () {
                    if(rsp.code === 200){
                        parent.location.reload()
                    }
                })
            }, 'json');
        }, function(){});
    }

</script>

