<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Develope */

$this->title = 'Create Develope';
$this->params['breadcrumbs'][] = ['label' => 'Developes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="develope-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
