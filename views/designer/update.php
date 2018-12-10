<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Designer */

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

?>
<div class="designer-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="designer-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'designer_id')->textInput() ?>

		<?= $form->field($model, 'title')->textInput() ?>

		<?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'facebook')->textInput() ?>
		<?= $form->field($model, 'instagram')->textInput() ?>
		<?= $form->field($model, 'behance')->textInput() ?>
		<?= $form->field($model, 'website')->textInput() ?>
		<?= $form->field($model, 'email')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>


</div>
