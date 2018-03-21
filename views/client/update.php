<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = 'Update Client: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->client_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="client-form">

		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

		<?= $form->field($model, 'client_id')->textInput() ?>

		<?= $form->field($model, 'client_group_id', ['labelOptions' => ['label' => '產業分類']])->dropDownList($group) ?>
		
		<?= $form->field($model, 'title')->textInput() ?>

		<?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'contact')->textarea(['rows' => 6]) ?>


		<?//= $form->field($imgfile_model, 'imgFile')->fileInput(['accept' => 'image/*']) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>


</div>
