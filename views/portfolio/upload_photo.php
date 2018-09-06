<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

$this->title = '上傳照片';
?>
<div class="portfolio-create">

	<h1><?= Html::encode($this->title).' -- '.$model->portfolio_id ?></h1>

	<div class="portfolio-form">

		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


		<?= $form->field($imgfile_model, 'imgFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'create']) ?>
		</div>

		<?php ActiveForm::end(); ?>


	</div>


</div>