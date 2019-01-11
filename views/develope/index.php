<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DevelopeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

$this->title = 'Developes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="develope-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Develope', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			'develope_id',
			'date:ntext',
			'name:ntext',
			'email:ntext',
			'title:ntext',
			[
				'attribute' => 'content',
				'format' => 'raw',
				'label' => '內容',
				'value' => function ($model) {
					$content_out = '<a href="#" onclick=" return false;"><span class="glyphicon glyphicon glyphicon-eye-open" data-toggle="#'.$model->develope_id.'"></span></a><div id="'.$model->develope_id.'" class="grid-view" style="display: none;">'.preg_replace("/[\n\r]/","<br>",$model->content).'</div>';
					return $content_out;
				}
			],
			'tracking_token:ntext',
			'tracking_status',
			'sales:ntext',
		],
	]); ?>
</div>
