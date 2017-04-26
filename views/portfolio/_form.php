<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'name')->textInput() ?>

	<?= $form->field($model, 'title')->textInput() ?>

	<?= $form->field($model, 'spec')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

	<?= $form->field($imgfile_model, 'imgFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

	<?
	/*= $form->field($model, 'content')->widget(TinyMce::className(), [
		'options' => ['rows' => 6],
		'language' => 'zh_TW',
		'clientOptions' => [
			'file_browser_callback'=>'functionxxx',
			'height'=>320,
			'menubar'=> true,
			'plugins' => [
				"advlist autolink lists link charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste image jbimages"
			],
			'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | removeformat code"
		]    
	]);*/
	?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'thumb')->textInput() ?>

	<?= $form->field($model, 'tag')->textInput() ?>

	<?= $form->field($model, 'company_id')->textInput() ?>

	<?= $form->field($model, 'designer_id')->textInput() ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'create']) ?>
	</div>

	<?php ActiveForm::end(); ?>



</div>
