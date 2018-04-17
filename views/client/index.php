<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

	<?php
		foreach ($client_by_group as $key => $value) {
			echo $value['chinese_name'];
			echo ListView::widget([
				'dataProvider' => $value['dataProvider'],
				'itemOptions' => ['class' => 'item'],
				'id' => 'client-listview',
				'layout' => '<div class="client">{items}</div>{pager}',
				'itemView' => function ($model, $key, $index, $widget) {

					$item = '<div class="client-item">';
					$item = $item.'<a href="'.Yii::$app->request->getBaseUrl().'?r=client%2Fview&amp;id='.urlencode($model->client_id).'">';
					$item = $item.$model->title;
					$item = $item.'<img src="'.Yii::$app->request->getBaseUrl().'/client/'.$model->logo.'">';
					$item = $item.'</a>';
					$item = $item.'</div>';

					return $item;
				},
			]); 
		}
	?>
		
</div>
