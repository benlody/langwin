<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Designer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designer-form">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'designer_id')->textInput() ?>

	<?= $form->field($model, 'title')->textInput() ?>

	<?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'contact')->textInput() ?>

	<?= $form->field($imgfile_model, 'imgFile')->fileInput(['accept' => 'image/*']) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
