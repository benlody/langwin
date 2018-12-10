<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DesignerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile(Yii::$app->request->getBaseUrl().'/assets/3c21fd83/css/bootstrap.css');
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/site.css');

?>
<div class="designer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Designer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'designer_id',
            'title:ntext',
            'desc:ntext',
            'photo:ntext',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</div>
