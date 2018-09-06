<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

$this->title = 'Portfolios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Portfolio', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'portfolio_id',
			'date:ntext',
			'title:ntext',
			'spec:ntext',
			'content:ntext',
			'designer_id',
			'company_id',
			'photo_uploaded',

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {upload_photo} {update_thumb}',
				'buttons' => [
					'upload_photo' => function ($url, $model, $key) {
						$options = [
							'title' => '上傳照片',
							'aria-label' => '上傳照片',
							'data-pjax' => '0',
						];
						return  Html::a('<span class="glyphicon glyphicon-camera"></span>', $url ,$options);
					},
					'update_thumb' => function ($url, $model, $key) {
						$options = [
							'title' => '更新縮圖',
							'aria-label' => '更新縮圖',
							'data-pjax' => '0',
						];
						return  Html::a('<span class="glyphicon glyphicon-picture"></span>', $url ,$options);
					},
				],
			],
		],
	]); ?>
</div>
