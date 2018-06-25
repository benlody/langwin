<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company', ['labelOptions' => ['label' => '公司名稱']]) ?>
    <?= $form->field($model, 'product', ['labelOptions' => ['label' => '產品名稱']]) ?>
    <?= $form->field($model, 'contact', ['labelOptions' => ['label' => '聯絡人']]) ?>
    <?= $form->field($model, 'tel', ['labelOptions' => ['label' => '聯絡電話']]) ?>
    <?= $form->field($model, 'email', ['labelOptions' => ['label' => 'E-mail']]) ?>




    <?= $form->field($model, 'link', ['labelOptions' => ['label' => '檔案雲端連結']])->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
