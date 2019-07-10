<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use common\models\Comment;
use yii\helpers\Url;
use frontend\components\RankingWidget;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="container" id="container">

	<div class="content">
	
		<div class="content-left about-content">
		


			<br>
			
			<div class="content">
                <h4><strong>关于本站：</strong></h4>
                <h5>Yii中文网致力于提供免费、优质、开源的Yii2.0中文学习资源，期待您的加入，让我们聚沙成塔，构建Yii中文学习资源第一平台！</h5>
                <br>
                <h4><strong>声明：</strong></h4>
                <h5>1.Yii中文网的商业资源是由本站技术人员设计制作完成的，版权归设计者所有。任何下载购买者不得擅自出售，发布，共享给别人使用。一经发现，收回资源，取消其资源使用权，并依法追究其法律责任。

                    2.本站的文字内容均为本站人员原创或整理，未经允许，禁止私自转载，若在其他网站发现本站内容，追究相应的法律责任。</h5>

                <br><h4><strong>愿景：
                    </strong></h4>
                <h5>本站致力于做一个高品质的资源网站，提供优质的教程，包括基础教程，常用扩展，以及视频教程。帮助大家快速掌握Yii框架，提供一个系统的学习环境和配套资源，从零基础到精通。

                </h5>

                <br>
                <h4><strong>联系我们：
                    </strong></h4>
                <h5>交换友链&问题讨论&投稿&友情赞助，您可以通过以下方式与我联系：
                    <br>

                    QQ:391430388
                    <br>

                    邮箱：xianan_huang@163.com</h5>
                <br>

            </div>
			
			<br>
			

		</div>





        <div class="content-right">
            <div class="sort-box">
                <ul class="sort-list">

                    <!--                    --><?//= TagsCloudWidget::widget(['tags'=>$tags])?>

                    <li class="list-title">
                        最新电影
                    </li>
                    <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
                </ul>
            </div>
            <div class="sort-box">
                <ul class="sort-list">
                    <li class="list-title">
                        热门电影
                    </li>
                    <?= RankingWidget::widget(['items'=>$hots])?>
                </ul>
            </div>
        </div>
		
		
	</div>

</div>
