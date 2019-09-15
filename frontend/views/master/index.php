<?php


?>
<div class="container homepage">
    <div class="row clearfix body">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="active list-group-item">音乐家</li>
            </ul>
        </div>
        <div class="col-md-9" style="padding-top: 8px;">
            <form action="" method="get">
                <table>
                    <tbody>
                    <tr>
                        <td valign="top">
                            <input type="text" class="form-control" id="txt2" autocomplete="off" name="MasterSearch[name]" size="53" maxlength="40" value="<?= isset($_GET['MasterSearch']['name']) ? $_GET['MasterSearch']['name'] : '';?>" placeholder="搜索音乐家" style="width: 300px;margin-right: 10px;"/
                        </td>
                        <td valign="top">
                            <input type="submit" class="btn btn-default hidden-xs" value="搜索!" />
                            <button type="submit" class="btn btn-default visible-xs"><i class="fa fa-search"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <br />
            <nav>
                <ul class="pagination pagination-sm">
                    <li class="<?= (Yii::$app->request->getUrl() == '/master') ? 'active':''?>"><a href="/master"><i class="glyphicon glyphicon-th-large"></i></a></li>
                    <li class="li-A"><a href="/master?char=A">A</a></li>
                    <li class="li-B"><a href="/master?char=B">B</a></li>
                    <li class="li-C"><a href="/master?char=C">C</a></li>
                    <li class="li-D"><a href="/master?char=D">D</a></li>
                    <li class="li-E"><a href="/master?char=E">E</a></li>
                    <li class="li-F"><a href="/master?char=F">F</a></li>
                    <li class="li-G"><a href="/master?char=G">G</a></li>
                    <li class="li-H"><a href="/master?char=H">H</a></li>
                    <li class="li-I"><a href="/master?char=I">I</a></li>
                    <li class="li-J"><a href="/master?char=J">J</a></li>
                    <li class="li-K"><a href="/master?char=K">K</a></li>
                    <li class="li-L"><a href="/master?char=L">L</a></li>
                    <li class="li-M"><a href="/master?char=M">M</a></li>
                    <li class="li-N"><a href="/master?char=N">N</a></li>
                    <li class="li-O"><a href="/master?char=O">O</a></li>
                    <li class="li-P"><a href="/master?char=P">P</a></li>
                    <li class="li-Q"><a href="/master?char=Q">Q</a></li>
                    <li class="li-R"><a href="/master?char=R">R</a></li>
                    <li class="li-S"><a href="/master?char=S">S</a></li>
                    <li class="li-T"><a href="/master?char=T">T</a></li>
                    <li class="li-U"><a href="/master?char=U">U</a></li>
                    <li class="li-V"><a href="/master?char=V">V</a></li>
                    <li class="li-W"><a href="/master?char=W">W</a></li>
                    <li class="li-X"><a href="/master?char=X">X</a></li>
                    <li class="li-Y"><a href="/master?char=Y">Y</a></li>
                    <li class="li-Z"><a href="/master?char=Z">Z</a></li>
                </ul>
            </nav>
            <?php if(isset($_GET['char']) && $_GET['char']){?>
                <p align="center"></p><?= count($composersList);?>&nbsp;音乐家已被发现:<br /><br />
                <div class="row" style="margin-left: 0">
                    <?php foreach ($composersList as $v):?>
                        <div class="col-md-3" style="margin-bottom: 10px"><a href="/master/<?= $v['id'];?>" target="_blank"><?= $v['name'];?><?= $v['ename']?"<br/><small>".$v['ename']."</small>":'';?></a><br></div>
                    <?php endforeach;?>
                </div>
            <?php }else{?>
                <p align="center"></p><?= isset($_GET['MasterSearch']['name']) ? count($composersList).' 音乐家已被发现' : '最新更新的个人资料';?>:<br /><br />
                <div class="row">
                    <?php foreach ($composersList as $v):?>
                        <div class="col-md-4" style="margin-bottom: 20px;">
                            <table cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td valign="top">
                                        <a href="/master/<?= $v['id'];?>" class="thumbnail" target="_blank">
                                            <img src="<?= Yii::$app->params['adminhost'].$v['pic'];?>" border="0" class="img-responsive" style="height: 135px"/>
                                        </a>
                                    </td>
                                    <td valign="top">&nbsp;&nbsp;</td>
                                    <td valign="top">
                                        <b><a href="/master/<?= $v['id'];?>" target="_blank"><?= $v['name'];?><?= $v['ename'] ? "<br/>".$v['ename']:'';?></a></b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach;?>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<script>
    var $_GET = (function(){
        var url = window.document.location.href.toString();
        var u = url.split("?");
        if(typeof(u[1]) == "string"){
            u = u[1].split("&");
            var get = {};
            for(var i in u){
                var j = u[i].split("=");
                get[j[0]] = j[1];
            }
            return get;
        } else {
            return {};
        }
    })();
    window.onload = function () {
        if($_GET['char']){
            var char = $_GET['char'].toUpperCase();
            console.log(char);
            if(char){
                var class_active = "li-"+char;
                $('.pagination-sm .active').removeClass();
                $('.'+class_active).addClass('active')
            }
        }
    }

</script>
