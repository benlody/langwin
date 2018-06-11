<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DevelopeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Developes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="develope-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Develope', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'develope_id',
            'name:ntext',
            'email:ntext',
            'title:ntext',
            'content:ntext',
             'tracking_token:ntext',
             'tracking_status',
             'sales:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
