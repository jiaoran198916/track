<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Awardsitem */

$this->title = '电影节详情:'.$model->id;
$this->registerJsFile('/static/bower_components/jquery/dist/jquery.min.js');
$this->params['breadcrumbs'][] = ['label' => '电影节列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = '电影节详情';
?>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-10">
            <!-- general form elements -->

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#base" data-toggle="tab">基本信息</a></li>
                    <li><a href="#hit" data-toggle="tab">获奖影片</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="base">

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="hit">
                        <?= $this->render('_hit', [
                            'model' => $model,
                        ]) ?>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>

</section>


<script>

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

