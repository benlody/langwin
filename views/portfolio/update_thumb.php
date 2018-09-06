<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

$this->title = '選擇縮圖';
?>
<div class="portfolio-create">

	<h1><?= Html::encode($this->title).' - '.$model->portfolio_id.' - '.$model->title ?></h1>

	<div class="portfolio-form">

		<?php $form = ActiveForm::begin(); ?>

		<?php  
			$radio = array();
			if(is_array($photos)){
				foreach ($photos as $key => $value) {
					$name = substr($value, strrpos($value, '/') + 1);
					$radio[$name] = '<img src="'.$value.'" width="200">';
				}
			}
		?>

		<?= $form->field($model, 'thumb')->radioList(
			$radio,
			['encode' => false]
		) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'create']) ?>
		</div>

		<?php ActiveForm::end(); ?>


	</div>


</div>