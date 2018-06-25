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
			'status',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
