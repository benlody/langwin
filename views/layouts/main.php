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

	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    
    <!-- CSS
	================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/megamenu.css">
	<link rel="stylesheet" href="css/pages.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>
<body>

<div class="loading relative">
	<div class="loading_animation cenmid"><img src="images/common/loading.gif" alt="" /></div>
</div>
	

<div class="wrap">



	<?php
	/*
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
			['label' => '聯絡／詢價', 'url' => ['/quotation/create']],
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
					 ['label' => '新增設計師', 'url' => ['/designer/create']],
					 '<li class="dropdown-header" align="center"><font color="green">'.'客戶'.'</font></li>',
					 ['label' => '新增客戶', 'url' => ['/client/create']],
					 '<li class="dropdown-header" align="center"><font color="green">'.'客戶開發'.'</font></li>',
					 ['label' => '寄開發信', 'url' => ['/develope/create_by_excel']],
					 ['label' => '開發信追蹤', 'url' => ['/develope/index']],
					 ['label' => '詢價列表', 'url' => ['/quotation/index']],
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
			['label' => '我們的客戶', 'url' => ['/client/index']],
			['label' => '聯絡／詢價', 'url' => ['/quotation/create']],

		];


	}

	NavBar::begin([
		'brandLabel' => 'Home',
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [
			'class' => 'navbar-inverse navbar-fixed-top',
		],
	]);

	echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => $items,
	]);
	NavBar::end();
	*/
	?>


	<header>

		<!--header fxarea-->
		<div class="fixarea">
			<!---->
			<div class="fxarea-rwd">
				<a href="index.html" class="logo relative block" hov="0.75"><span class="helper"></span><img class="" src="images/common/logo.png" alt="" /></a>
				<!--menu-->
				<div class="menu-container">
					<div class="menu">
						<ul class="layer-1-ul">
							<li class="layer-1-li">

								<!--search-->
								<div class="rwd-menu-search">
									<form class="menu-search-form">
										<input type="text" class="input-text" placeholder="搜尋關鍵字" />
										<button type="submit" class="search-mag"><i class="fas fa-search"></i></button>
									</form>
								</div>
								<!--search-->
							</li>
							<li class="layer-1-li"><a href="portfolio.html" class="layer-1 menu-line"><h2>精選作品</h2></a></li>
							<li class="layer-1-li"><a href="designer.html" class="layer-1 menu-line"><h2>合作設計師</h2></a></li>
							<li class="layer-1-li"><a href="client.html" class="layer-1 menu-line"><h2>我們的客戶</h2></a></li>
							<li class="layer-1-li"><a href="contact.html" class="layer-1 menu-line"><h2>聯絡／詢價</h2></a></li>
						</ul>
					</div>
				</div>
				<!--menu-->

				<!--search-->
				<div class="menu-search">
					<div class="v-helper"></div>
					<div class="wrap">
					<div class="menu-search-btn"></div>
					<form class="menu-search-form">
						<input type="text" class="input-text" placeholder="搜尋關鍵字" />
						<button type="submit" class="search-mag"><i class="fas fa-search"></i></button>
					</form>
					</div>
				</div>
				<!--search-->

			</div>	
			<!---->
		</div>
		<!--header fxarea-->
	</header>
	<!--end header-->


	<div class="container">
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<?= $content ?>
	</div>
</div>

<!--start footer-->
<footer>

	<!--rwd width limited-->
	<div class="rwd-width-limited">
		<div class="clearfix">
			<div class="footer-r">
				<!--
				<div class="one-contact">
					<h3>某某某某</h3>
					<p><a href="other.html" hov="0.8">其他頁</a></p>
					<p><a href="other.html" hov="0.8">其他其他其</a></p>
				</div>

				<div class="one-contact">
					<h3>說明說明</h3>
					<p><a href="other.html" hov="0.8">說明說明說明說明</a></p>
				</div>

				<div class="one-contact">
					<h3>bnlablabla</h3>
					<p><a href="other.html" hov="0.8">說明說明說明說明</a></p>
				</div>
				-->

				<div class="one-contact">
					<h3>聯絡資訊</h3>
					<p><span class="bold">電話：</span><a href="tel:+886-2-2999-9099" hov="0.8">＋886-2-2999-9099</a></p>
					<p><span class="bold">地址：</span><a href="https://goo.gl/maps/SssLWqhx4jo" hov="0.8">新北市三重區光復路一段83巷8號2樓</a></p>
				</div>

				<div class="one-contact">
					<h3>營業時間</h3>
					<p>星期一 至 星期五<br />08：00 至 18：00</p>
				</div>
			</div>

			<div class="footer-l">
				<div class="social">
					<a href="#"><span class="v-helper"></span><i class="fab fa-facebook-f"></i></a>
					<a href="#"><span class="v-helper"></span><i class="fab fa-instagram"></i></a>
					<a href="#"><span class="v-helper"></span><i class="fab fa-line"></i></a>
					<a href="#"><span class="v-helper"></span><i class="far fa-envelope"></i></a>
				</div>
				<div class="privacy">Copyright © 光隆印刷廠股份有限公司, All Rights Reserved.</div>
			</div>
		</div>
	</div>
</footer>
<!--end footer-->

<!-- Javascript
================================================== -->
<!-- Get Google CDN's jQuery and jQuery UI with fallback to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.blImageCenter.js"></script>
<script src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script src="js/jquery.nice-select.js"></script>
<script src="js/megamenu.js"></script>
<script src="js/slick.js"></script>
<script src="js/common.js"></script>
<script src="js/index.js"></script>

</body>
</html>
<?php $this->endPage() ?>
