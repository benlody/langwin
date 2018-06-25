<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */

$this->title = 'Create Quotation';
?>
<div class="quotation-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<div>
	<?php
		echo Tabs::widget([
			'items' => [
				[
					'label' => '書籍／手冊',
					'content' => $this->render('book', ['model' => $model]),
//					'options' => ['id' => 'myveryownID'],
//					'active' => true
				],

				[
					'label' => '名片／卡片',
					'content' => $this->render('card', ['model' => $model]),
				],
				[
					'label' => '海報／單張DM／摺頁',
					'content' => $this->render('poster', ['model' => $model]),
				],
				[
					'label' => '紙盒',
					'content' => $this->render('box', ['model' => $model]),
				],
				[
					'label' => '貼紙',
					'content' => $this->render('sticker', ['model' => $model]),
				],
				[
					'label' => '信封',
					'content' => $this->render('envelope', ['model' => $model]),
				],
				[
					'label' => '手提袋',
					'content' => $this->render('bag', ['model' => $model]),
				],
				[
					'label' => '其他',
					'content' => $this->render('else', ['model' => $model]),
				],

			],
		])
	?>
	</div>

</div>
