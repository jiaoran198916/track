<?php

use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\components\RankingWidget;

?>
<div class="slider movie-items">
    <div class="container">
        <div class="row">
            <div class="social-link">
                <p>Follow us: </p>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-googleplus"></i></a>
                <a href="#"><i class="ion-social-youtube"></i></a>
            </div>
            <div  class="slick-multiItemSlider">

                <?php foreach ($bannerData as $k=>$v):?>

                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="<?= Url::to(['movie/detail', 'id' => $v->movie_id])?>" target="_blank">
                                <img src="<?= (strpos($v->movie->cover, 'uploads') !== false) ? Yii::$app->params['adminhost'].$v->movie->cover : Yii::$app->params['cdnHost'].$v->movie->cover ?>" alt="<?= $v->title ?>" width="285" height="437">
                            </a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="<?= Url::to(['movie/detail', 'id' => $v->movie_id])?>">Sci-fi</a></span>
                            </div>
                            <h6><a href="<?= Url::to(['movie/detail', 'id' => $v->movie_id])?>" target="_blank"><?= $v->movie->name ?></a></h6>
                            <p><i class="ion-android-star"></i>
<!--                                <span>7.4</span> /10-->
                                <span><?= count($v->movie->episodes)?></span>&nbsp;songs
                            </p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<div class="movie-items">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8">
                <div class="title-hd">
                    <h2>正在热映</h2>
<!--                    <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>-->
                </div>
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1">#默认</a></li>
<!--                        <li><a href="#tab2"> #最受欢迎</a></li>-->
                        <li><a href="#tab2">  #最多歌曲</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    <?php foreach ($default as $k=>$v):?>
                                    <div class="slide-it">
                                        <div class="movie-item">
                                            <div class="mv-img">
                                                <img src="<?= Yii::$app->params['cdnHost'].$v->cover?>" alt="" width="185" height="284" style="width: 185px">
                                            </div>
                                            <div class="hvr-inner">
                                                <a  href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank">查看<i class="ion-android-arrow-dropright"></i> </a>
                                            </div>
                                            <div class="title-in">
                                                <h6><a href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank"><?= $v->name?></a></h6>
                                                <p><i class="ion-android-star"></i><span><?= $v->num?></span> songs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    <?php foreach ($showing as $k=>$v):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="<?= Yii::$app->params['cdnHost'].$v->cover?>" alt="" width="185" height="284" style="width: 185px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank">查看 <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank"><?= $v->name?></a></h6>
                                                    <p><i class="ion-android-star"></i><span><?= $v->num?></span> songs</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-hd">
                    <h2>最近添加</h2>
                    <a href="#" class="viewall">更多<i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links-2">
                        <li class="active"><a href="#tab21">#默认</a></li>
                        <li ><a href="#tab22"> #最多歌曲</a></li>
<!--                        <li><a href="#tab23">  #最高评价 </a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div id="tab21" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    <?php foreach ($default_recent as $k=>$v):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="<?= Yii::$app->params['cdnHost'].$v->cover?>" alt="" width="185" height="284" style="width: 185px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank"> 查看<i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank"><?= $v->name?></a></h6>
                                                    <p><i class="ion-android-star"></i><span><?= $v->num?></span> songs</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div id="tab22" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    <?php foreach ($recent as $k=>$v):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="<?= Yii::$app->params['cdnHost'].$v->cover?>" alt="" width="185" height="284" style="width: 185px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank">查看 <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="<?= Url::to(['movie/detail', 'id' => $v->id])?>" target="_blank"><?= $v->name?></a></h6>
                                                    <p><i class="ion-android-star"></i><span><?= $v->num?></span> song</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="ads">
                        <img src="/static/images/new/uploads/ads1.png" alt="" width="336" height="296">
                    </div>
                    <div class="celebrities">
                        <h4 class="sb-title">热门音乐家</h4>
                        <?php foreach ($master as $k=>$v):?>
                        <div class="celeb-item">
                            <a href="<?= Url::to(['master/detail', 'id' => $v->id])?>" target="_blank"><img src="<?= (strpos($v->pic, 'uploads') !== false) ? Yii::$app->params['adminhost'].$v->pic : Yii::$app->params['cdnHost'].$v->pic ?>" alt="<?= $v->name?>" width="70" height="70"></a>
                            <div class="celeb-author">
                                <h6><a href="<?= Url::to(['master/detail', 'id' => $v->id])?>" target="_blank"><?= $v->name?></a></h6>
                                <span>作曲家</span>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <a href="/master" class="btn">查看全部音乐家<i class="ion-ios-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- latest new v1 section-->
<div class="latestnew" style="background-color: #06121e;">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8">
                <div class="ads">
                    <img src="/static/images/new/uploads/ads2.png" alt="" width="728" height="106">
                </div>
                <div class="title-hd">
                    <h2>新闻资讯</h2>
                </div>
                <div class="tabs">
                    <ul class="tab-links-3">
                        <li class="active"><a href="#tab31">#电影 </a></li>
                        <li><a href="#tab32"> #电视 </a></li>
                        <li><a href="#tab33">  #音乐家</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab31" class="tab active">
                            <div class="row">
                                <div class="blog-item-style-1">
                                    <img src="/static/images/new/uploads/blog-it1.jpg" alt="" width="170" height="250">
                                    <div class="blog-it-infor">
                                        <h3><a href="<?= Url::to(['post/detail', 'id' => $posts[0]['id']])?>" target="_blank"><?= $posts[0]['name']?></a></h3>
                                        <span class="time"><?= date("Y-m-d H:i", $posts[0]['create_time']) ?></span>
                                        <p><?= mb_substr(strip_tags($posts[0]['content']),0,288,'utf-8').'...' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="morenew">
                    <div class="title-hd">
                        <h3>有关电影配乐的更多新闻</h3>
                        <a href="/post" class="viewall">查看所有文章<i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="more-items">
                        <div class="left">
                            <?php foreach ($posts as $k=>$v):?>
                            <?php if(in_array($k, [1,2])):?>
                                <div class="more-it">
                                    <h6><a href="<?= Url::to(['post/detail', 'id' => $v['id']])?>" target="_blank"><?= $v['name']?></a></h6>
                                    <span class="time"><?= date("Y-m-d H:i", $v['create_time']) ?></span>
                                </div>
                            <?php endif;?>
                            <?php endforeach;?>
                        </div>
                        <div class="right">
                            <?php foreach ($posts as $k=>$v):?>
                                <?php if(in_array($k, [3,4])):?>
                                    <div class="more-it">
                                        <h6><a href="<?= Url::to(['post/detail', 'id' => $v['id']])?>" target="_blank"><?= $v['name']?></a></h6>
                                        <span class="time"><?= date("Y-m-d H:i", $v['create_time']) ?></span>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sb-facebook sb-it">
                        <h4 class="sb-title">Find us on douban</h4>
<!--                        <iframe src="" data-src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhaintheme%2F%3Ffref%3Dts&tabs=timeline&width=300&height=315px&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="300" height="315" style="border:none;overflow:hidden" ></iframe>-->
                    </div>
                    <div class="sb-twitter1 sb-it">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end of latest new v1 section-->

