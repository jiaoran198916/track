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

<div class="container filepage">
    <div class="col-md-9">
        <div class="row">

            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">版权声明</h3>
                </div>
                <div class="panel-body">
                    <p>本站所有信息均由互联网爬虫自动搜索得来，相关链接已注明来源。不提供任何影视的上传、下载、存储、播放。相关版权归属原电影公司及其著作人所有。
                        如果无意中侵犯了您的权益，请发送邮件给我们，（<a target="_blank" href="mailto:920495391:qq.com">920495391@qq.com）</a>，我们会及时做相应处理，谢谢合作。</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">关于我们</h3>
                </div>
                <div class="panel-body">
                    <p>目前市场虽然有大量电影相关的网站，但大多是下载类或影评类，缺乏专门的电影音乐盘点的网站，电影音乐相关的信息散落在各大音乐网站；</p>
                    <p>网站主要盘点每部电影的所有音乐，包括片头片尾曲，插曲，配乐，BGM等，按时间轴排列，所有内容均由网友自发编辑；</p>
                    <p>产品形态，目前主要以Web网站为主，后期会考虑移动端、微信公众号、APP等；</p>
                    <p>网站的主要页面，包括首页、电影详情页、音乐人详情页、电影音乐奖项页，后面会酌情添加其他页面；</p>
                    <p>关于电影详情页，除了电影基本信息（数据从豆瓣拉取）外，还有，一是有一段对电影音乐的总体介绍及评价，二是按时间轴顺序逐个展示歌曲的名称、歌手、专辑、风格、试听链接，可参看网易云音乐专辑列表；</p>
                    <p>网站不提供在线试听功能，只是提供试听链接，可点击链接跳转到第三方播放平台，我们只提供一个索引，既可以简化功能集中精力做核心业务，也可以减少版权相关的纠纷；</p>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">联系我们</h3>
                </div>
                <div class="panel-body">
                    <p>目前网站只本人一个人负责，目前在职，利用业余时间在做，决定做这个公益性质的项目，纯兴趣使然，所以诚心邀请有志者参与进来，技术帮助，产品设计，宣传推广都非常欢迎！</p>
                    <p>如感兴趣可扫码下面微信二维码</p>
                    <img src="/static/images/erweima.jpg" class="img-responsive" alt="" style="width: 300px;">
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">
        <div class="list-group">
            <a href="#" class="list-group-item loading active">最新发布</a>
            <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item active">点击排行</a>
            <?= RankingWidget::widget(['items'=>$hots])?>
        </div>
    </div>

</div>
