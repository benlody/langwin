<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */

$this->title = '光隆印刷廠股份有限公司 - 台北優質印刷服務 - 詢價／聯絡';
?>

	<?php
		if($show_msg){
			echo "<script type='text/javascript'>show_msg = true;</script>";
		}
	?>

	<div class="page-visual">
		<div class="pic"><div class="cover"></div><img src="images/tmp/contact-visual.jpg" class="v-centerimg" alt="" /></div>	
		<div class="title"><span class="v-helper"></span><h2>CONTACT</h2></div>
	</div>

	<!--start main-->
	<div class="wrapper">
		<!--full width block-->
		<section class="pd-v-50 bg-yf">
			<!--rwd width limited-->
			<div class="rwd-width-limited clearfix">
				<div class="mg-b-40">
					<!--title & tab-->
					<div class="clearfix index-tab mg-b-10">
						<h2 class="text-24 lh-40 color-d-blue bold left">聯絡／詢價</h2>
					</div>
					<!--title & tab-->
				</div>

				<div class="contact-tab">
					<div tab="tab-1" class="one-tab active">書籍／手冊</div>
					<div tab="tab-2" class="one-tab">名片／卡片</div>
					<div tab="tab-3" class="one-tab">海報／單張DM／摺頁</div>
					<div tab="tab-4" class="one-tab">貼紙</div>
					<div tab="tab-5" class="one-tab">信封</div>
					<div tab="tab-6" class="one-tab">紙袋</div>
					<div tab="tab-7" class="one-tab">紙盒</div>
					<div tab="tab-8" class="one-tab">其他</div>
				</div>

				<!--tabs-->
				<?= $this->render('book', ['model' => $model]); ?>
				<?= $this->render('card', ['model' => $model]); ?>
				<?= $this->render('poster', ['model' => $model]); ?>
				<?= $this->render('sticker', ['model' => $model]); ?>
				<?= $this->render('envelope', ['model' => $model]); ?>
				<?= $this->render('bag', ['model' => $model]); ?>
				<?= $this->render('box', ['model' => $model]); ?>
				<?= $this->render('else', ['model' => $model]); ?>
				<!--tabs-->
						
			</div>
			<!--rwd width limited -->

		</section>
		<!--full width block-->

	</div>
	<!--end main-->
