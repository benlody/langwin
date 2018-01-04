<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model app\models\Client */
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/masonry.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/imagesloaded.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/portfolio-index.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/portfolio-index.css');

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="client-view">


	<div class="client-info">
		<div class="client-logo">
			<?= Html::img(Yii::$app->request->getBaseUrl().'/client/' . $model->logo) ?>
		</div>
		<div class="client-desc">
			<?= Html::label($model->title) ?>
			<?= Html::label($model->desc) ?>
		</div>
		<div class="client-contact">
			<?= Html::label($model->contact) ?>
		</div>
	</div>

	<div class="portfolio-index">

			<?= ListView::widget([
				'dataProvider' => $dataProvider,
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
