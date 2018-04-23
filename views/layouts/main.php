<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
	<?php
	NavBar::begin([
		'brandLabel' => 'Home',
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [
			'class' => 'navbar-inverse navbar-fixed-top',
		],
	]);
	?>
	

	<?php

	if(Yii::$app->user->identity->group === User::GROUP_ADMIN){
		$items = [
			'<li>'
			. Html::beginForm(['/portfolio/index'], 'get', ['class' => 'navbar-form'])
			. Html::input('text', 'search', '', ['placeholder' => "Search.."])
			. Html::submitButton(
				'<i class="glyphicon glyphicon-search"></i>',
				['class' => 'btn btn-link']
			)
			. Html::endForm()
			. '</li>',

			['label' => '精選作品案例', 'url' => ['/portfolio/index']],
			['label' => '合作設計師', 'url' => ['/designer/index']],
			['label' => '我們的客戶', 'url' => ['/client/index']],
			[
				'label' => '後台管理',
				'items' => [
					 '<li class="dropdown-header" align="center"><font color="green">'.'作品'.'</font></li>',
					 ['label' => '作品列表', 'url' => ['/portfolio/list']],
					 ['label' => '新增作品', 'url' => ['/portfolio/create']],
					 ['label' => 'Excel上傳', 'url' => ['/portfolio/create_by_excel']],
					 ['label' => '照片上傳', 'url' => ['/portfolio/list']],
					 ['label' => '編輯作品', 'url' => ['/portfolio/list']],
					 '<li class="dropdown-header" align="center"><font color="green">'.'設計師'.'</font></li>',
					 ['label' => Yii::t('app', 'Inventory Transaction - XDC'), 'url' => ['/inventory/transaction', 'warehouse' => 'xm']],
					 '<li class="dropdown-header" align="center"><font color="green">'.'客戶'.'</font></li>',
					 ['label' => Yii::t('app', 'Inventory Overview - T'), 'url' => ['/inventory/overview', 'warehouse' => 'tw']],
					 ['label' => Yii::t('app', 'Inventory Overview - XDC'), 'url' => ['/inventory/overview', 'warehouse' => 'xm']],
					 ['label' => Yii::t('app', 'Inventory Adjust'), 'url' => ['/inventory/adjust']],
					 ['label' => Yii::t('app', 'Low Stock Items'), 'url' => ['/inventory/low_stock']],
				],
			],

			'<li>'
				. Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
				. Html::submitButton(
					'Logout (' . Yii::$app->user->identity->username . ')',
					['class' => 'btn btn-link']
				)
				. Html::endForm()
				. '</li>'
		];

	} else {
		$items = [
			'<li>'
			. Html::beginForm(['/portfolio/index'], 'get', ['class' => 'navbar-form'])
			. Html::input('text', 'search', '', ['placeholder' => "Search.."])
			. Html::submitButton(
				'<i class="glyphicon glyphicon-search"></i>',
				['class' => 'btn btn-link']
			)
			. Html::endForm()
			. '</li>',

			['label' => '精選作品案例', 'url' => ['/portfolio/index']],
			['label' => '合作設計師', 'url' => ['/designer/index']],
			['label' => '我們的客戶', 'url' => ['/client/index']]
		];


	}
	echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => $items,
	]);
	NavBar::end();
	?>

	<div class="container">
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<?= $content ?>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; 光隆印刷 <?= date('Y') ?></p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
