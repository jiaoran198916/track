<?php
use yii\helpers\Html;
?>

<!--<div class="col-xs-6 col-sm-4 col-md-3">-->

<!--</div>-->



<div class="card" style="width: 318px;margin-bottom: 50px;">
    <a href="<?=$model->detail?>" target="_blank">
    <img class="card-img-top" src="<?= Yii::$app->params['adminhost'].$model->pic?>" alt="Card image cap" width="318" height="180">
    </a>
    <div class="card-body" style="margin-top: 20px;">
        <a href="<?=$model->detail?>" target="_blank">
        <h4 class="card-title"><?=$model->name?> <small><?=$model->ename?></small></h4>
        </a>
        <p class="card-text">
            <?php foreach ($model->itemsArr as $v):?>
            <span class="label label-info"><?= $v['name']?></span>
            <?php endforeach;?>
        </p>
<!--        <a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
</div>
