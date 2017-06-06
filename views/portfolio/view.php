<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Portfolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="portfolio-photos">
	<?php
		if(is_array($photos )){
			foreach ($photos as $key => $value) {
				echo '<img src="'.$value.'">';
			}
		}
	 ?>
	</div>

	<div class="portfolio-content">
		<p>
		<p><label> Content </label></p>
	<?php

		echo str_replace("\n","<br>" , $model->content);

	?>
		</p>
	</div>

	<div class="portfolio-spec">
		<p>
		<p><label> Spec </label></p>
	<?php

		echo str_replace("\n","<br>" , $model->spec);

	?>
		</p>
	</div>

	<div class="portfolio-tag">
		<p>
		<p><label> Tags </label></p>
	<?php
		$tag = preg_replace('/\s(?=)/', '', $model->tag);
		$tag_list = explode(",", $tag);
		foreach ($tag_list as $key => $value) {
			echo '<a href = index.php?r=portfolio&search='.$value.'>'.$value.'</a><br>';
		}

	?>
		</p>
	</div>

	<div class="portfolio-client">
	<?php

		echo 'client';

	?>
	</div>


	<div class="portfolio-designer">
		<div class="portfolio-designer-logo">
			<?= Html::img(Yii::$app->request->getBaseUrl().'/designer/' . $designer_model->photo) ?>
		</div>
		<div class="portfolio-designer-desc">
			<?= Html::label($designer_model->title) ?>
			<?= Html::label($designer_model->desc) ?>
		</div>
		<div class="portfolio-designer-contact">
			<?= Html::label($designer_model->contact) ?>
		</div>
	</div>




</div>
