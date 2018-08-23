<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */

$this->title = 'Create Quotation';
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
					<div tab="tab-1" class="one-tab active">書籍/手冊</div>
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
				<!--tabs-->
				
				<!--tab5-->
				<div id="tab-5" class="tab-con">
				
					貼紙<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					
				</div>
				<!--tab5-->
				
				<!--tab6-->
				<div id="tab-6" class="tab-con">
				
					信封<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					
				</div>
				<!--tab6-->
				
				<!--tab7-->
				<div id="tab-7" class="tab-con">
				
					手提袋<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					
				</div>
				<!--tab7-->
					
				<!--tab8-->
				<div id="tab-8" class="tab-con">
				
					其他<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					
				</div>
				<!--tab8-->
						
			</div>
			<!--rwd width limited -->
			
		</section>
		<!--full width block-->
		
	</div>
	<!--end main-->

	<?php

		//echo $this->render('book', ['model' => $model]);
		/*
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

*/
	?>
