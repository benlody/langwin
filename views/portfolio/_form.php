<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'spec')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumb')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'designer_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
