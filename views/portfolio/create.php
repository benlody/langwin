<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

$this->title = 'Create Portfolio';
$this->params['breadcrumbs'][] = ['label' => 'Portfolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		'imgfile_model' => $imgfile_model,
		'client' => $client,
		'designer' => $designer,

	]) ?>

</div>
