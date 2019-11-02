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
        <div class="row">
            <div class="col-md-3">
                <div class="list-group about">
                        <a href="#main" role="tab" data-toggle="tab" class="active list-group-item">基本概况</a>
                        <a href="#source" role="tab" data-toggle="tab" class=" list-group-item">资源来源</a>
                        <a href="#announcement" role="tab" data-toggle="tab" class=" list-group-item">版权声明</a>
                        <a href="#events" role="tab" data-toggle="tab" class=" list-group-item">大事年表</a>
                        <a href="#contact" role="tab" data-toggle="tab" class=" list-group-item">联系我们</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="main">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic Information</h3>
                            </div>
                            <div class="panel-body count-about">
<!--                                <h1>-->
<!--                                    专注于 <strong>电影音乐</strong> 的盘点与分享-->
<!--                                </h1>-->
                                <div class="list-group clearfix">
                                    <div class="col-md-4">
                                        <h1><?= $movieCount?> <small>电影</small></h1>
                                    </div>
                                    <div class="col-md-4">
                                        <h1><?= $masterCount?> <small>音乐家</small></h1>
                                    </div>
                                    <div class="col-md-4">
                                        <h1><?= $episodeCount?> <small>歌曲</small></h1>
                                    </div>
                                </div>
                                <br>
                                <p><span class="glyphicon glyphicon-grain"></span> 网站专注于 <strong>电影音乐</strong> 的盘点与分享</p>
                                <p><span class="glyphicon glyphicon-grain"></span> 在电影详情页会罗列出每部电影的所有音乐，包括片头片尾曲，插曲，配乐，BGM等，按时间线排序</p>
                                <p><span class="glyphicon glyphicon-grain"></span> 电影详情页，除了电影基本信息及曲目列表外，还会有一段对电影音乐的总体介绍及评价</p>
                                <p><span class="glyphicon glyphicon-grain"></span> 产品形态，目前主要以Web网站为主，后期会考虑移动端、微信公众号、APP等</p>
                                <p><span class="glyphicon glyphicon-grain"></span> 网站不提供在线试听及资源下载功能，但会提供第三方链接，点击可跳转至第三方播放/下载平台</p>

                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="source">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Resource Source</h3>
                            </div>
                            <div class="panel-body">
                                <p>本网站是个资源聚合平台，会将其他网站的链接集中到这里，下面列出的都是网站资源常见的来源.</p>
                                <p>在线类包含点击链接可在线播放，一般为拥有版权的大站，下载类为需下载的，不可直接播放，一般为小众的论坛等.</p>
                                <p>列表不断添加中，欢迎补充或推荐.</p>
                            </div>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                <th width="5%">#</th>
                                <th width="25%">名称及LOGO</th>
                                <th width="25%">链接</th>
                                <th width="45%">简介</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="success">
                                    <th colspan="4" style="text-align:center;">在线</th>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>
                                        网易云 <img src="/static/images/wangyiyun.png" alt="" width="20" height="20">
                                    </td>
                                    <td><a href="https://music.163.com/" target="_blank">https://music.163.com/</a></td>
                                    <td>国内最大的在线播放平台，电影原声专辑众多</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        虾米 <img src="/static/images/xiami.png" alt="" width="20" height="20">
                                    </td>
                                    <td><a href="https://www.xiami.com/" target="_blank">https://www.xiami.com/</a></td>
                                    <td>发现更多好音乐</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        QQ音乐 <img src="/static/images/qqmusic.png" alt="" width="20" height="20">
                                    </td>
                                    <td><a href="https://y.qq.com/" target="_blank">https://y.qq.com/</a></td>
                                    <td>海量资源</td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>
                                        酷我 <img src="/static/images/kuwo.png" alt="" width="20" height="20">
                                    </td>
                                    <td><a href="http://www.kuwo.cn/" target="_blank">http://www.kuwo.cn/</a></td>
                                    <td>有一些单曲，可在线播放</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>
                                        Bilibili <img src="/static/images/bili.jpg" alt="" height="20">
                                    </td>
                                    <td><a href="https://www.bilibili.com" target="_blank">https://www.bilibili.com/</a></td>
                                    <td>二次元弹幕视频网站，有各种资源</td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>
                                        tunefind <img src="/static/images/tunefind.png" alt="" height="20" style="background: #000">
                                    </td>
                                    <td><a href="https://www.tunefind.com/" target="_blank">https://www.tunefind.com/</a></td>
                                    <td>一个国外网站，可在线播放电影电视插曲</td>
                                </tr>

                                <tr class="success" >
                                    <th colspan="4" style="text-align:center;">下载</th>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>
                                        百度网盘 <img src="/static/images/baiduyun.jpg" alt="" height="20">
                                    </td>
                                    <td></td>
                                    <td>个人上传的资源一般会通过度盘分享，需登录下载</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>
                                        CD包音乐网 <img src="/static/images/cdbao.png" alt="" height="20">
                                    </td>
                                    <td><a href="https://www.cdbao.net/" target="_blank">https://www.cdbao.net/</a></td>
                                    <td>高清音质分享下载论坛，有原声版块</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        听听原声 <img src="/static/images/ttost.png" alt="" height="20" style="background: #000">
                                    </td>
                                    <td><a href="http://www.ttost.com/" target="_blank">http://www.ttost.com/</a></td>
                                    <td>综合原声类分享下载博客，包含一些最新的电影原声</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="announcement">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Announcement</h3>
                            </div>
                            <div class="panel-body">
                                <p>本站所有信息均由互联网搜索得来，相关链接已注明来源，本站不对显示的内容承担责任；</p>
                                <p>本站资源皆由人工收集整理自互联网；</p>
                                <p>本站资源均为免费资源,不会将这些资源的本体作任何形式的商业用途；</p>
                                <p>本站严令禁止发布受《中华人民共和国版权法》保护范围内的各种资源信息；</p>
                                <p>如果无意中侵犯了您的权益，请发送邮件给我们，（<a target="_blank" href="mailto:920495391:qq.com">920495391@qq.com）</a>，我们会及时做相应处理，谢谢！</p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="events">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Events</h3>
                            </div>
                            <div class="panel-body">

                                <p>
                                    <strong>2019-06-30</strong> 项目启动，源码提交至github
                                </p>
                                <p>
                                    <strong>2019-07-27</strong> 网站正式上线
                                </p>
                                <p>
                                    <strong>2019-08-30</strong> 网站被 <a href="http://www.ruanyifeng.com/blog/2019/08/weekly-issue-71.html" target="_blank">阮一峰科技周刊71期</a> 被推荐，流量猛增，当天浏览近万，独立访客过千
                                </p>
                                <p>
                                    <strong>2019-11-02</strong> 网站正式换成Block新模板，并打算长期使用
                                </p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="contact">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contact</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>站长微信，添加请注明“皎然影音乐”</p>
                                        <img src="/static/images/erweima.jpg" class="" alt="" width="200">
                                    </div>
                                    <div class="col-md-6">
                                        <p>QQ：920495391</p>
                                        <p>Email：920495391@qq.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</div>
<script>
    window.onload = function () {
        $('.about a').click(function () {
            if(!$(this).hasClass('active')){
                $(this).addClass('active').siblings().removeClass('active');
            }
        })
    }

</script>
