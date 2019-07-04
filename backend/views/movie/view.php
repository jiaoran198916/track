<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = $model->name;
$this->registerJsFile('/static/bower_components/jquery/dist/jquery.min.js');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            电影管理
            <small>新增电影</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-10">
                <!-- general form elements -->

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basic" data-toggle="tab">基本信息</a></li>
                        <li><a href="#episode" data-toggle="tab">音乐片段</a></li>
                        <li><a href="#resource" data-toggle="tab">资源列表</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic">

                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="episode">
                            <?= $this->render('_episode', [
                                'model' => $model,
                                'episodeModel' => $episodeModel,
                            ]) ?>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="resource">
                            <?= $this->render('_resource', [
                                'model' => $model,
                            ]) ?>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>

    </section>

</div>

<!--<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>-->
<script>

    var delEpi = function (id) {
        $.post('index.php?r=/episode/del', {id: id}, function (res) {
            if(res.code === 200){
                //$.closeModal("modal-default");
                dialog.success('删除成功','index.php?r=/movie/view&id=' +res.data+ '#episode');
            }else{
                dialog.error('删除失败');
            }
        }, 'json');
    }

    var modifyEpi = function (obj) {
        $("#episode-id").val(obj.id);
        $("#episode-movie_id").val(obj.movie_id);
        $("#episode-min").val(obj.min);
        $("#episode-sec").val(obj.sec);
        $("#episode-name").val(obj.name);
        $("#episode-foreign_name").val(obj.foreign_name);
        $("#episode-summary ").val(obj.summary );
        var musician_id = obj.musician_id.toString();

        if(musician_id.indexOf(',') > -1){
            $("#episode-musician_id ").val(musician_id.split(',') ).select2();
        }else{
            $("#episode-musician_id ").val(parseInt(musician_id)).select2();
        }

        $("#w1").attr("action", "/index.php?r=episode%2Fmodify")
        $("#modal-default").modal();
    }

    var toAddPage = function(){
        //$("#w1").reset();
       document.getElementById("w1").reset();
        $("#episode-musician_id ").val('').select2();

        $("#modal-default").modal();
    }
    window.onload = function(){
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Datemask yyyy/mm/dd
            $('#movie-release').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })

            $('#teaListTable').DataTable({
                // "dom": 'l <"div.toolbar"> tip',
                "dom": 'Bfrtip',
                // 'lengthChange': true,
                //     "buttons": [
                //         'copy',
                //         {
                //             "text": 'My button',
                //             action: function ( dt ) {
                //                 console.log( dt );
                //             }
                //         }
                //     ]
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'excel', 'pdf'
                // ]
            });

            // $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');



        })


    }

</script>




