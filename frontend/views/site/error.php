<?php


use yii\helpers\Html;

$this->title = $name;
?>



<div class="container filepage">
    <div class="site-error" style="font-size: 20px">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            点击回 <a href="/" >首页</a>
        </p>

    </div>
</div>
