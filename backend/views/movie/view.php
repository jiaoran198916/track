<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */


$this->title = '电影详情:'.$model->name;
$this->registerJsFile('/static/bower_components/jquery/dist/jquery.min.js');
$this->params['breadcrumbs'][] = ['label' => '电影列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = '电影详情';

?>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-10">
                <!-- general form elements -->

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#base" data-toggle="tab">基本信息</a></li>
                        <li><a href="#episode" data-toggle="tab">音乐片段</a></li>
                        <li><a href="#resource" data-toggle="tab">资源列表</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="base">

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


<script>




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

        var hash = document.location.hash;
        var prefix = "tab_";
        if (hash) {
            $('.nav-tabs a[href="'+hash.replace(prefix,"")+'"]').tab('show');
        }

        // Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash.replace("#", "#" + prefix);
        });


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




