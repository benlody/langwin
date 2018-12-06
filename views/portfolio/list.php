<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

?>
<div class="portfolio-index">

	<?php $form = ActiveForm::begin(); ?>

	<label class="control-label">ID</label>
	<?= Html::input('text', 'PortfolioSearch[portfolio_id]', $search_param['portfolio_id'], ['class' => 'form-control', 'id' => 'PortfolioSearch_portfolio_id']) ?>
	<div class="help-block"></div>

	<label class="control-label">Title</label>
	<?= Html::input('text', 'PortfolioSearch[title]', $search_param['customer_id'], ['class' => 'form-control', 'id' => 'PortfolioSearch_title']) ?>
	<div class="help-block"></div>

	<label class="control-label">Spec</label>
	<?= Html::input('text', 'PortfolioSearch[spec]', $search_param['customer_name'], ['class' => 'form-control', 'id' => 'PortfolioSearch_spec']) ?>
	<div class="help-block"></div>

	<label class="control-label">Tag</label>
	<?= Html::input('text', 'PortfolioSearch[tag]', $search_param['addr'], ['class' => 'form-control', 'id' => 'PortfolioSearch_tag']) ?>
	<div class="help-block"></div>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary', 'name' => 'list']) ?>
	</div>

	<?php ActiveForm::end(); ?>

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
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
