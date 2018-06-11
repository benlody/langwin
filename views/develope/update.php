<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Develope */

$this->title = 'Update Develope: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Developes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->develope_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="develope-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
