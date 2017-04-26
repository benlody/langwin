<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Portfolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'portfolio_id',
            'name:ntext',
            'spec:ntext',
            'designer_id',
            'company_id',
            'tag',
            'description',
            'title',
        ],
    ]) ?>

    <div class="portfolio-content">
    <?php

        echo $model->content;

    ?>
    </div>

    <div class="portfolio-designer">
    <?php

        echo 'desinger';

    ?>
    </div>

    <div class="portfolio-company">
    <?php

        echo 'company';

    ?>
    </div>



</div>
