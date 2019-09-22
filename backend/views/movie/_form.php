<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Master;
use common\models\User;
use common\models\Movie;
use common\models\Country;
use common\models\Type;
use common\models\Language;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .fa-certificate{
        margin-left: 5px;
        font-size: 10px;
        color: red;
    }
</style>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form'], 'enableAjaxValidation' => true, 'action' => \yii\helpers\Url::to(['create'])]); ?>
<div class="box-body">

    <?= $form->field($model, 'douban_id', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}', 'options' =>['class' => 'col-md-3']])->textInput([]) ?>
    <div class="col-md-1 " style="margin-top: 25px;">
        <button class="btn-success btn btn-block" id="pullBtn" type="button">拉取</button>
    </div>

    <input type="hidden" id="movie-id" name="Movie[id]" value="<?= $model->id? $model->id: 0?>">
    <?= $form->field($model, 'name', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}', 'options' =>['class' => 'col-md-12']])->textInput() ?>
    <?= $form->field($model, 'ename', ['options' =>['class' => 'col-md-12']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cover', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}', 'options' =>['class' => 'col-md-1', 'style' => 'height: 146px']])->input('hidden') ?>
    <div class="col-md-3" id="img-area">
        <?php if($model->cover):?>
        <img src="<?= $model->cover ?>" alt="" width="109" height="146">
        <?php else:?>
        <div style="margin-top: 25px;">暂无图片</div>
        <?php endif;?>
    </div>

    <?= $form->field($model, 'year', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}', 'options' =>['class' => 'col-md-12']])->dropDownList(Movie::getYearData(),['class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'musician_id', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}', 'options' =>['class' => 'col-md-12']])->dropDownList(Master::find()->select(['name', 'id'])->where('type=0')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择音乐作者"]) ?>

    <?= $form->field($model, 'director_id', ['options' =>['class' => 'col-md-12']])->dropDownList(Master::find()->select(['name', 'id'])->where('type=1')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择导演"]) ?>

    <?= $form->field($model, 'area_id', ['options' =>['class' => 'col-md-12']])->dropDownList(Country::find()->select(['name', 'id'])->where('valid=1')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择地区"]) ?>

    <?= $form->field($model, 'type_id', ['options' =>['class' => 'col-md-12']])->dropDownList(Type::find()->select(['name', 'id'])->where('valid=1')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择类型"]) ?>

    <?= $form->field($model, 'language_id', ['options' =>['class' => 'col-md-12']])->dropDownList(Language::find()->select(['name', 'id'])->where('valid=1')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择语言"]) ?>

    <?= $form->field($model, 'desc', ['options' =>['class' => 'col-md-12']])->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'music_desc', ['options' =>['class' => 'col-md-12']])->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'duration', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}', 'options' =>['class' => 'col-md-12']])->textInput() ?>


    <?= $form->field($model, 'user_id', ['options' =>['class' => 'col-md-12']])->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者', 'class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'status', ['options' =>['class' => 'col-md-12']])->radioList(['0' => '待审核', '1' => '已审核']) ?>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? '新 增' : '修 改' ?></button>
    <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
</div>
<?php ActiveForm::end(); ?>

<script>
    window.onload = function(){
            //Initialize Select2 Elements
            $('.select2').select2();

        $("#pullBtn").click(function () {
            let id = $("#movie-douban_id").val();
            if(!id){
                alert('豆瓣id不能为空');
                return false;
            }
            let url = 'https://api.shenjian.io/?appid=25bc9de22c9f14140dbea906f180e892&movieid='+id;

            $.ajax(url, {
                type: "GET",
                dataType: 'jsonp',
                crossDomain: true
            }).then(function(rsp) {
                console.log(rsp)
                if(rsp && rsp.error_code === 0){
                    data = rsp.data;
                    let idx = data.name.indexOf(' ');
                    if(idx > 0){
                        let name = data.name.substring(0, idx);
                        let ename = data.name.substring(idx + 1);
                        $("#movie-name").val(name);
                        $("#movie-ename").val(ename);
                    }else{
                        $("#movie-name").val(data.name);
                        $("#movie-ename").val('');
                    }
                    $("#movie-cover").val(data.cover);
                    $("#img-area").empty().append('<img src="'+data.cover+'" alt="" width="109" height="146">');
                    $("#movie-year").val(data.year).trigger("change");
                    select2ByText("movie-director_id", data.directors);
                    select2ByText("movie-type_id", data.type);
                    if(data.language.indexOf('/') > 0){
                        data.language = data.language.split(' / ')
                    }
                    select2ByText("movie-language_id", data.language);
                    if(data.area.indexOf('/') > 0){
                        data.area = data.area.split(' / ')
                    }
                    select2ByText("movie-area_id", data.area);
                    $("#movie-desc").val(data.summary);
                    $("#movie-duration").val(parseInt(data.duration));
                }
            })

        });

        // 通过text 设置select2的值
        function select2ByText (obj, textArr) {
            let select2Obj = $('#'+obj);
            let filter = [];
            if(typeof textArr === 'string'){
                //转成数组
                textArr = [textArr]
            }
            select2Obj.find("option").each(function(){
                for(let i=0;i<textArr.length;i++){
                    if (textArr[i] === $(this).html()) {
                        filter.push($(this).val())
                    }
                }
            });
            select2Obj.val(filter).trigger("change");
        }


    }

</script>

