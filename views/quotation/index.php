<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Quotation', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'date:ntext',
//			'quotation_id',
			[
				'attribute' => '',
				'headerOptions' => ['style' => 'width:30%'],
				'format' => 'raw',
				'label' => '客戶資料',
				'value' => function ($model) {
					$info = "";
					$info = $info."公司名稱: ".$model->company."<br>";
					$info = $info."印件名稱: ".$model->product."<br>";
					$info = $info."聯絡人: ".$model->contact."<br>";
					$info = $info."電話: ".$model->tel."<br>";
					$info = $info."Email: ".$model->email;
					return $info;
				}
			],
			[
				'attribute' => 'content',
				'headerOptions' => ['style' => 'width:35%'],
				'format' => 'ntext',
				'label' => '內容'
			],
			'link:ntext:雲端檔案連結',
			'sales:ntext',
			[
				'attribute' => 'status',
				'headerOptions' => ['style' => 'width:10%'],
				'format' => 'raw',
				'label' => '狀態',
				'value' => function ($model) {
					if($model->status == 0){	// untake
						return '未認領';
					} else if ($model->status == 1){
						return '已認領';
					} else if ($model->status == 2){
						return '已成交';
					} else {
						return '未知';
					}
				}
			],
			[
				'attribute' => '',
				'format' => 'raw',
				'value' => function ($model) {
					if($model->status == 0){	// untake
						$opt = '<a href="'.Yii::$app->request->getBaseUrl().'?r=quotation%2Ftake&amp;id='.urlencode($model->quotation_id).'" title="認領" data-pjax="0"><span class="glyphicon glyphicon glyphicon-user"></span></a>';
					} else if ($model->status == 1 & $model->sales == Yii::$app->user->identity->username){ //taken
						$opt = '<a href="'.Yii::$app->request->getBaseUrl().'?r=quotation%2Fdeal&amp;id='.urlencode($model->quotation_id).'" title="成交" data-pjax="0"><span class="glyphicon glyphicon glyphicon-ok"></span></a>';
					}
					return $opt;
				}
			],

		],
	]); ?>
</div>
