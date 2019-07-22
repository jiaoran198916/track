<?php
use yii\helpers\Html;
?>

<!--<div class="col-xs-6 col-sm-4 col-md-3">-->
    <a href="<?= $model->detail ?>" target="_blank"><div class="thumbnail bounceIn animated"><img class="l_d" src="<?= Yii::$app->params['adminhost'].$model->cover?>" data-original="" alt="<?= $model->name ?>" style="display: block;height: 265px;"><div class="caption text-center"><?= $model->name ?></div></div></a>
<!--</div>-->
