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

	<div class="portfolio-content">
	<?php

		echo $model->content;

	?>
	</div>


	<div class="portfolio-client">
	<?php

		echo 'client';

	?>
	</div>
	<div class="portfolio-photos">
	<?php
		if(is_array($photos )){
			foreach ($photos as $key => $value) {
				echo '<img src="'.$value.'" width="200">';
			}
		}
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



	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'portfolio_id:ntext',
			'spec:ntext',
			'designer_id',
			'company_id',
			'tag',
			'description',
			'thumb',
			'title',
		],
	]) ?>

</div>
