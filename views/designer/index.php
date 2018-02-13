<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DesignerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Designers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Designer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'designer_id',
            'title:ntext',
            'desc:ntext',
            'facebook:ntext',
            'instagram:ntext',
            'behance:ntext',
            'website:ntext',
            'email:ntext',
            'photo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
