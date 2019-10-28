<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\RankingWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="hero hero3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
                <ul class="breadcumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<!-- celebrity single section-->

<div class="page-single movie-single cebleb-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="mv-ceb">
                    <img src="<?= (strpos($model->pic, 'upload')===false)? Yii::$app->params['cdnHost'].$model->pic:Yii::$app->params['adminhost'].$model->pic ?>" alt="">
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="movie-single-ct">
                    <h1 class="bd-hd"><?= $model->name?></h1>
                    <p class="ceb-single">Artist  |  Composer</p>
                    <div class="social-link cebsingle-socail">
                        <a href="#"><i class="ion-social-facebook"></i></a>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                        <a href="#"><i class="ion-social-googleplus"></i></a>
                        <a href="#"><i class="ion-social-linkedin"></i></a>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overviewceb">总览</a></li>
                                <li><a href="#biography"> 简介</a></li>
                                <li><a href="#filmography">作品</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overviewceb" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <?= $model->desc ?>
                                            <p class="time"><a href="#">详情<i class="ion-ios-arrow-right"></i></a></p>
                                            <div class="title-hd-sm">
                                                <h4>作品</h4>
                                                <a href="#" class="time">所有作品<i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film1.jpg" alt="">
                                                        <div>
                                                            <a href="#">X-Men: Apocalypse </a>
                                                            <p class="time">Logan</p>
                                                        </div>

                                                    </div>
                                                    <p>...  2016</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film2.jpg" alt="">
                                                        <div>
                                                            <a href="#">Eddie the Eagle </a>
                                                            <p class="time">Bronson Peary</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2015</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film3.jpg" alt="">
                                                        <div>
                                                            <a href="#">Me and Earl and the Dying Girl </a>
                                                            <p class="time">Hugh Jackman</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2015</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film4.jpg" alt="">
                                                        <div>
                                                            <a href="#">Night at the Museum 3 </a>
                                                            <p class="time">Blackbeard</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2014</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film5.jpg" alt="">
                                                        <div>
                                                            <a href="#">X-Men: Days of Future Past </a>
                                                            <p class="time">Wolverine</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2012</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film6.jpg" alt="">
                                                        <div>
                                                            <a href="#">The Wolverine </a>
                                                            <p class="time">Logan</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2011</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film7.jpg" alt="">
                                                        <div>
                                                            <a href="#">Rise of the Guardians </a>
                                                            <p class="time">Bunny</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2011</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img src="images/uploads/film8.jpg" alt="">
                                                        <div>
                                                            <a href="#">The Prestige </a>
                                                            <p class="time">Robert Angier</p>
                                                        </div>
                                                    </div>
                                                    <p>...  2010</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <?php if($model->ename): ?>
                                                <div class="sb-it">
                                                    <h6>外文名:  </h6>
                                                    <p><a href="#"><?= $model->ename ?></a></p>
                                                </div>
                                            <?php endif;?>

                                            <div class="sb-it">
                                                <h6>生日: </h6>
                                                <p><?= $model->birthday ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>地区:  </h6>
                                                <p><?= $model->city?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>性别: </h6>
                                                <p><?= $model->sexText ?></p>
                                            </div>
<!--                                            <div class="sb-it">-->
<!--                                                <h6>Keywords:</h6>-->
<!--                                                <p class="tags">-->
<!--                                                    <span class="time"><a href="#">jackman</a></span>-->
<!--                                                    <span class="time"><a href="#">wolverine</a></span>-->
<!--                                                    <span class="time"><a href="#">logan</a></span>-->
<!--                                                    <span class="time"><a href="#">blockbuster</a></span>-->
<!--                                                    <span class="time"><a href="#">final battle</a></span>-->
<!--                                                </p>-->
<!--                                            </div>-->
                                            <div class="ads">
                                                <img src="images/uploads/ads1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="biography" class="tab">
                                    <div class="row">
                                        <?= $model->desc ?>
                                    </div>
                                </div>
                                <div id="filmography" class="tab">
                                    <div class="row">

                                        <div class="topbar-filter">
                                            <p>Found <span>14 movies</span> in total</p>
                                            <label>Filter by:</label>
                                            <select>
                                                <option value="popularity">Popularity Descending</option>
                                                <option value="popularity">Popularity Ascending</option>
                                                <option value="rating">Rating Descending</option>
                                                <option value="rating">Rating Ascending</option>
                                                <option value="date">Release date Descending</option>
                                                <option value="date">Release date Ascending</option>
                                            </select>
                                        </div>
                                        <!-- movie cast -->
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film1.jpg" alt="">
                                                    <div>
                                                        <a href="#">X-Men: Apocalypse </a>
                                                        <p class="time">Logan</p>
                                                    </div>

                                                </div>
                                                <p>...  2016</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film2.jpg" alt="">
                                                    <div>
                                                        <a href="#">Eddie the Eagle </a>
                                                        <p class="time">Bronson Peary</p>
                                                    </div>
                                                </div>
                                                <p>...  2015</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film3.jpg" alt="">
                                                    <div>
                                                        <a href="#">Me and Earl and the Dying Girl </a>
                                                        <p class="time">Hugh Jackman</p>
                                                    </div>
                                                </div>
                                                <p>...  2015</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film4.jpg" alt="">
                                                    <div>
                                                        <a href="#">Night at the Museum 3 </a>
                                                        <p class="time">Blackbeard</p>
                                                    </div>
                                                </div>
                                                <p>...  2014</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film5.jpg" alt="">
                                                    <div>
                                                        <a href="#">X-Men: Days of Future Past </a>
                                                        <p class="time">Wolverine</p>
                                                    </div>
                                                </div>
                                                <p>...  2012</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film6.jpg" alt="">
                                                    <div>
                                                        <a href="#">The Wolverine </a>
                                                        <p class="time">Logan</p>
                                                    </div>
                                                </div>
                                                <p>...  2011</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film7.jpg" alt="">
                                                    <div>
                                                        <a href="#">Rise of the Guardians </a>
                                                        <p class="time">Bunny</p>
                                                    </div>
                                                </div>
                                                <p>...  2011</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left cebleb-film">
                                                    <img src="images/uploads/film8.jpg" alt="">
                                                    <div>
                                                        <a href="#">The Prestige </a>
                                                        <p class="time">Robert Angier</p>
                                                    </div>
                                                </div>
                                                <p>...  2010</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- celebrity single section-->