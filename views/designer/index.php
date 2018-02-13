<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\DesignerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Designers';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designer-index">

	<?= ListView::widget([
		'dataProvider' => $dataProvider,
		'itemOptions' => ['class' => 'item'],
		'id' => 'designer-listview',
		'layout' => '<div class="designer">{items}</div>{pager}',
		'itemView' => function ($model, $key, $index, $widget) {

			$item = '<div class="designer-item">';
			$item = $item.'<a href="'.Yii::$app->request->getBaseUrl().'?r=designer%2Fview&amp;id='.urlencode($model->designer_id).'">';
			$item = $item.$model->designer_id;
			$item = $item.'<img src="'.Yii::$app->request->getBaseUrl().'/designer/'.$model->photo.'">';
			$item = $item.'<img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->thumb1.'">';
			$item = $item.'<img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->thumb2.'">';
			$item = $item.'<img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->thumb3.'">';
			$item = $item.'</a>';
			$item = $item.'</div>';
			
/*			<a href="'.
					Yii::$app->request->getBaseUrl().'?r=portfolio%2Fview&amp;id='.urlencode($model->portfolio_id).
					'"><img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->portfolio_id.'/'.$model->thumb.
					'"></a>'.$model->title.'<br>'.$model->content.'

*/
			return $item;
		},
	]); 
	?>
		
</div>
