<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Master;
use common\models\User;
use common\models\Movie;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */

?>
<p>
<button type="button" class="btn btn-default" onclick="toAddPage()" data-toggle="modal" data-target="#modal-default">新增</button>
<button type="button" class="btn btn-danger" onclick="delType()">修改</button>
</p>
<table id="teaListTable" class="table table-bordered table-striped">
    <thead>
    <tr>
<!--        <th><input id="checkall" type="checkbox" onclick="checkall()"/></th>-->
        <th>ID</th>
        <th>定位</th>
        <th>名称</th>
        <th>原名</th>
        <th>电影</th>
        <th>歌手</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($model->episodes)):?>
    <?php foreach ($model->episodes as $e): ?>
        <tr>
        <td><?= $e->id ?></td>
        <td><?= $e->min ?></td>
        <td><?= $e->name ?></td>
        <td><?= $e->foreign_name ?></td>
        <td><?= $e->movie->name ?></td>
        <td><?= $e->musician->name ?></td>
        <td>caozuo</td>

        </tr>

    <?php endforeach;?>
    <?php endif;?>
    </tbody>

</table>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">新增片段</h4>
            </div>
            <?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>

            <input type="hidden" name="movie_id" value="4">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="episode-min">位置</label>
                        <input type="number" class="" id="episode-min" name="Episode[min]"> :
                        <input type="number" class="" id="episode-sec" name="Episode[sec]">
                    </div>
                    <div class="form-group">
                        <label for="episode-name">名称</label>
                        <input type="text" class="form-control" id="episode-name" placeholder="名称" name="Episode[name]">
                    </div>
                    <div class="form-group">
                        <label for="episode-name">外文名</label>
                        <input type="text" class="form-control" id="episode-foreign_name" placeholder="名称" name="Episode[foreign_name]">
                    </div>
                <div class="form-group">
                    <label for="episode-summary">简介</label>
                    <input type="text" class="form-control" id="episode-summary" placeholder="简介" name="Episode[summary]">
                </div>
                <div class="form-group">
                    <label for="episode-musician_id">歌手</label>
                <select class="form-control select2" id="episode-musician_id" name="Episode[musician_id]">
                    <option value="">请选择歌手</option>
                    <option value="1">王菲</option>
                    <option value="2">陈奕迅</option>
                </select>
                </div>

                <?= $form->field($model, 'musician_id')->dropDownList(Master::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择演员"]) ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">确定</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<form id="w0" class="mws-form" action="/index.php?r=episode%2Fcreate&amp;movie_id=43" method="post">
    <input type="hidden" name="_adminCSRF" value="UU9DdkRmNVhnHzAwFwgBIBwHCEArMUMNYyl7GS8TARo9InQRDhFvCw==">
    <div class="mws-form-inline">
        <div class="mws-form-row field-episode-movie_id required">
            <label class="control-label" for="episode-movie_id">所属电影</label>
            <div class="mws-form-item small"><select id="episode-movie_id" class="mws-textinput" name="Episode[movie_id]">
                    <option value="32">考试</option>
                    <option value="33">碟中谍</option>
                    <option value="34">神秘国度</option>
                    <option value="35">捕蛇者说</option>
                    <option value="36">老友记</option>
                    <option value="37">神探狄仁杰</option>
                    <option value="38">我不是妖神</option>
                    <option value="39">大佛普拉斯</option>
                    <option value="40">爱情</option>
                    <option value="41">恋爱大人</option>
                    <option value="43" selected="">胡小伟ddd</option>
                    <option value="44">没有其他人了吗</option>
                    <option value="45">ddd</option>
                    <option value="47">一出好戏</option>
                    <option value="48">鎌仓物语</option>
                    <option value="49">康德的世界</option>
                    <option value="50">康德的世界</option>
                    <option value="51">社交网络</option>
                    <option value="52">等等等</option>
                </select>

                <div class="help-block"></div></div>
        </div>
        <div class="mws-form-row field-episode-timing required">
            <label class="control-label" for="episode-timing">位置</label>
            <div class="mws-form-item small"><input type="text" id="episode-timing" class="mws-textinput" name="Episode[timing]">

                <div class="help-block"></div></div>
        </div>
        <div class="mws-form-row field-episode-name">
            <label class="control-label" for="episode-name">标题</label>
            <div class="mws-form-item small"><input type="text" id="episode-name" class="mws-textinput" name="Episode[name]" maxlength="128">

                <div class="help-block"></div></div>
        </div>
        <div class="mws-form-row field-episode-foreign_name">
            <label class="control-label" for="episode-foreign_name">外文名</label>
            <div class="mws-form-item small"><input type="text" id="episode-foreign_name" class="mws-textinput" name="Episode[foreign_name]" maxlength="128">

                <div class="help-block"></div></div>
        </div>
        <div class="mws-form-row field-episode-summary required">
            <label class="control-label" for="episode-summary">简介</label>
            <div class="mws-form-item medium"><textarea id="episode-summary" class="mws-textinput" name="Episode[summary]" rows="6"></textarea>

                <div class="help-block"></div></div>
        </div>


        <div class="mws-form-row field-episode-musician_id">
            <label class="control-label" for="episode-musician_id">歌手</label>
            <div class="mws-form-item small"><select id="episode-musician_id" class="mws-textinput" name="Episode[musician_id]">
                    <option value="">请选择歌手</option>
                    <option value="1">王菲</option>
                    <option value="2">陈奕迅</option>
                </select>

                <div class="help-block"></div></div>
        </div>
    </div>
    <div class="mws-button-row" style="text-align:left">
        <input type="submit" value="新 增" class="mws-button green">
        <input type="submit" value="取 消" class="mws-button gray">
    </div>
</form>



<script>
    window.onload = function(){
        $(function () {


        })
    }

</script>

