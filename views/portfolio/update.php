<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

?>
<div class="portfolio-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="portfolio-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'portfolio_id')->textInput() ?>

		<?= $form->field($model, 'title')->textInput() ?>

		<?= $form->field($model, 'company_id', ['labelOptions' => ['label' => '客戶']])->dropDownList($client) ?>

		<?= $form->field($model, 'designer_id', ['labelOptions' => ['label' => '設計師']])->dropDownList($designer) ?>

		<?= $form->field($model, 'spec')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'tag')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
