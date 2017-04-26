<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/masonry.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/imagesloaded.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/portfolio-index.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/portfolio-index.css');

$this->title = 'Portfolios';
//$this->params['breadcrumbs'][] = $this->title;



?>
<div class="portfolio-index">
	

		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item'],
			'id' => 'my-listview-id',
 	        'layout' => '<div class="waterfall">{items}</div>{pager}',
			'itemView' => function ($model, $key, $index, $widget) {
				return '<div class="waterfall-item"><img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->thumb.
						'">'.$model->title.'<br>'.$model->description.'</div>';
	        },
	    ]); 
		?>

</div>

