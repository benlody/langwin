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

	<link rel="shortcut icon" href="images/KL_logo.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    
    <!-- CSS
	================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/megamenu.css">
	<link rel="stylesheet" href="css/pages.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/jquery-confirm.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>

<div class="loading relative">
	<div class="loading_animation cenmid"><img src="images/common/loading.gif" alt="" /></div>
</div>
	

<div class="wrap">


	<header>

		<!--header fxarea-->
		<div class="fixarea">
			<!---->
			<div class="fxarea-rwd">
				<a href="index.html" class="logo relative block" hov="0.75"><span class="helper"></span><img class="" src="images/tmp/KL-LOGO-B.png" alt="" />&nbsp<img class="" src="images/common/logo.png" alt="" /></a>
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
							<li class="layer-1-li"><a href="index.php?r=portfolio%2Findex" class="layer-1 menu-line"><h2>精選作品</h2></a></li>
							<li class="layer-1-li"><a href="index.php?r=designer%2Findex" class="layer-1 menu-line"><h2>合作設計師</h2></a></li>
							<li class="layer-1-li"><a href="index.php?r=client%2Findex" class="layer-1 menu-line"><h2>我們的客戶</h2></a></li>
							<li class="layer-1-li"><a href="index.php?r=quotation%2Fcreate" class="layer-1 menu-line"><h2>聯絡／詢價</h2></a></li>


							<?php if(!Yii::$app->user->isGuest) : ?>
							<li class="layer-1-li">
								<div class="layer-1 menu-line"><h2>後臺管理<i class="fa fa-angle-down mg-l-10" aria-hidden="true"></i></h2></div>
								<ul class="layer-2-ul">
										<li class="layer-2-li">
											<a href="index.php?r=portfolio/list" class="layer-3"><h4>作品列表(清單)</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=portfolio/create_by_excel" class="layer-3"><h4>作品Excel上傳</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=portfolio/list&photo_uploaded=0" class="layer-3"><h4>照片上傳</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=portfolio/list" class="layer-3"><h4>編輯作品</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=designer/create" class="layer-3"><h4>新增設計師</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=client/create" class="layer-3"><h4>新增客戶</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=develope/create_by_excel" class="layer-3"><h4>寄開發信</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=develope/index" class="layer-3"><h4>開發信追蹤</h4></a>
										</li>
										<li class="layer-2-li">
											<a href="index.php?r=quotation/index" class="layer-3"><h4>詢價列表</h4></a>
										</li>
								</ul>
							</li>
							<?php endif; ?>

						</ul>
					</div>
				</div>
				<!--menu-->

				<!--search-->
				<div class="menu-search">
					<div class="v-helper"></div>
					<div class="wrap">
					<div class="menu-search-btn"></div>
					<form class="menu-search-form" action="/langwin/web/index.php" method="get">
						<input type="hidden" name="r" value="portfolio/index">
						<input type="text" name="search" class="input-text" placeholder="搜尋關鍵字" />
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
					<p><span class="bold">Email：</span>customerservice@lang-win.com.tw</p>
				</div>

				<div class="one-contact">
					<h3>營業時間</h3>
					<p>星期一 至 星期五<br />08：30 至 17：30</p>
				</div>
			</div>

			<div class="footer-l">
				<!--div class="social">
					<a href="#"><span class="v-helper"></span><i class="fab fa-facebook-f"></i></a>
					<a href="#"><span class="v-helper"></span><i class="fab fa-instagram"></i></a>
					<a href="#"><span class="v-helper"></span><i class="fab fa-line"></i></a>
					<a href="#"><span class="v-helper"></span><i class="far fa-envelope"></i></a>
				</div!>
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
<script src="js/jquery-confirm.js"></script>
<script src="js/expandcollapse.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/common.js"></script>
<script src="js/p-inner.js"></script>
<script src="js/index.js"></script>

<script>
$(document).ready(function(){

	//submit confirm
	$('.cd-btn').on('click', function (){
		$.confirm({
			title: '聯絡設計師',
			content: '' +
			'<form action="" class="">' +
			'<div class="form-group">' +
			'<input type="text" class="input-text block cd-input-text mg-b-20 cd-mail" placeholder="輸入您的 Email" required />' +
			'<textarea class="input-textarea block cd-textarea cd-con" placeholder="輸入內容" required ></textarea>' +
			'</div>' +
			'</form>',
			buttons: {
				formSubmit: {
					text: '送 出',
					btnClass: 'cd-btn-blue',
					action: function () {
						var cdcon = this.$content.find('.cd-con').val();
						var cdmail = this.$content.find('.cd-mail').val();
						if(!cdcon || !cdmail){
							if(!cdcon && !cdmail){
								$.alert('請輸入 Email 及 內容');
								return false;
							}
							else if(!cdcon){
								$.alert('請輸入內容');
								return false;
							}
							else if(!cdmail){
								$.alert('請輸入 Email');
								return false;
							}
						}
						$.alert('已送出');
					}
				},
				cancel: function () {
					//close
				},
			},

			onContentReady: function () {
				// bind to events
				var jc = this;
				this.$content.find('form').on('submit', function (e) {
					// if the user submits the form by pressing enter in the field.
					e.preventDefault();
					jc.$$formSubmit.trigger('click'); // reference the button and click it
				});
			}
		});
	});
});
</script>

<script>
$(document).ready(function(){
	//tab change
	$('.one-tab').on('click',function(){
		$(this).addClass('active');
		var TabId =  $(this).attr('tab');
		$('#'+TabId).show();
		$(this).siblings('.one-tab').removeClass('active');
		$('#'+TabId).siblings('.tab-con').hide();
	});
});
</script>

<script>
$(document).ready(function(){
	//submit confirm
	if(typeof show_msg !== 'undefined' && show_msg){
		$.alert({
			title: '感謝您',
			content: '表單已送出，我們將儘快與您聯繫',
		});
		show_msg = false;
	}
});
//select option
$(".nice-sel-wrap").on('change',function() {

	var $this = $(this);
	var $input = $($this.data('target'));

	if(this.value == 'else'){
		document.getElementById($input.selector).disabled = false;
		document.getElementById($input.selector).style.display = 'inline-block';
	} else {
		document.getElementById($input.selector).disabled = true;
		document.getElementById($input.selector).style.display = 'none';
	};

});

</script>


</body>
</html>
<?php $this->endPage() ?>
