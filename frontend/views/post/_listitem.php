<?php
use yii\helpers\Html;
?>

<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url;?>"><?= Html::encode($model->title);?></a></h2>
	
		<div class="author">
		<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->author->nickname);?></em>
		</div>
	</div>
	
	<br>
	<div class="content">
	<?= $model->beginning;?>	
	</div>
	
	<br>
	<div class="nav">
		<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
		<?= implode(', ',$model->tagLinks);?>
	</div>
	
</div>