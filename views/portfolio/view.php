<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/masonry.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/imagesloaded.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/portfolio-index.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/portfolio-index.css');

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

	<!-- 設計師區塊 -->
	<? if(0 != strcmp( $model->designer_id, "0_no_designer")): ?>

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


		<div class="portfolio-index">

				<?= ListView::widget([
					'dataProvider' => $designerPortfolioDataProvider,
					'itemOptions' => ['class' => 'item'],
					'id' => 'my-listview-id',
					'layout' => '<div class="waterfall">{items}</div>{pager}',
					'itemView' => function ($model, $key, $index, $widget) {
						return '<div class="waterfall-item"><a href="'.
								Yii::$app->request->getBaseUrl().'?r=portfolio%2Fview&amp;id='.urlencode($model->portfolio_id).
								'"><img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->portfolio_id.'/'.$model->thumb.
								'"></a>'.$model->title.'<br>'.$model->content.'</div>';
					},
				]); 
				?>

		</div>
	</div>
	<? endif; ?>

	<!-- 客戶區塊 -->
	<? if(0 != strcmp( $model->company_id, "0_no_client")): ?>
	<div class="portfolio-client">
		<div class="portfolio-client-logo">
			<?= Html::img(Yii::$app->request->getBaseUrl().'/client/' . $client_model->logo) ?>
		</div>
		<div class="portfolio-client-desc">
			<?= Html::label($client_model->title) ?>
			<?= Html::label($client_model->desc) ?>
		</div>
		<div class="portfolio-client-contact">
			<?= Html::label($client_model->contact) ?>
		</div>

	</div>
	<? endif; ?>

</div>
