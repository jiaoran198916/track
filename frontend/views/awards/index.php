<?php

use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\components\RankingWidget;

?>

<div class="container homepage">

    <div class="body">
    <div class="col-md-9">

        <h4 id="normal-cards" style="margin-top:20px;">电影音乐奖项</h4>
        <br>

            <?= ListView::widget([
                    'id' => 'postList',
                    'options' => ['tag' => 'div', 'class' => 'row content'],
                    'itemOptions' => ['tag' => 'div', 'class' => 'col-md-6 col-sm-6'],
                    'dataProvider' => $dataProvider,
                    'itemView' => '_listimg',//子视图,显示一篇文章的标题等内容.
                    'layout' => '{items}<div class="col-md-12" style="padding: 0">{pager}</div>',

                    'pager' => [
                        'maxButtonCount' => 5,
                        'nextPageLabel' => Yii::t('app','下一页'),
                        'prevPageLabel' => Yii::t('app','上一页'),
                    ],
            ]);
            ?>

    </div>
    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">

        <div class="list-group">
            <a href="javascript:" class="list-group-item loading active">最新发布</a>
            <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
        </div>

        <div class="list-group">
            <a href="javascript:void()" class="list-group-item loading active">点击排行</a>
            <?= RankingWidget::widget(['items'=>$hots, 'type' => 'score'])?>
        </div>

    </div>
    </div>
</div>


<script>

</script>


