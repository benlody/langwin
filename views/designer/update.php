<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Designer */

$this->title = 'Update Designer: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Designers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->designer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="designer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
