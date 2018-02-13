<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Designer */

$this->title = 'Update Designer: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Designers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->designer_id]];
$this->params['breadcrumbs'][] = 'Update';
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
