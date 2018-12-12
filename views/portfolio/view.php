<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->title = "光隆印刷廠股份有限公司 - 台北優質印刷服務 - 精選作品 - ".$model->title;
?>
	<!--visual-->
	<div class="page-visual">
		<div class="pic"><div class="cover"></div><img src=<?= "images/".$model->portfolio_id.'/'.$model->thumb ?> class="v-centerimg" alt="" /></div>
		<div class="title"><span class="v-helper"></span><h2><?= $model->title ?></h2></div>
	</div>
	<!---visual-->

	<!--start main-->
	<div class="wrapper">
		<!--full width block-->
		<section class="pd-v-50 bg-yf">
			<!--rwd width limited-->
			<div class="rwd-width-limited clearfix sticky-wrapper">
				<div class="portfolio-grid-2-l">
					<!--sticky fixed area-->
					<div class="sticky unfixed">

						<div class="mg-b-30">
							<!--title & tab-->
							<div class="clearfix index-tab mg-b-10">
								<h2 class="text-24 lh-40 color-d-blue bold left"><?= $model->title ?></h2>
							</div>
							<!--title & tab-->
						</div>

						<? if(0 != strcmp( $model->company_id, "0_no_client")): ?>
						<a href= <?= "index.php?r=ortfolio%2Findex&search=".$client_model->title ?> class="portfolio-avatar mg-b-15 inlineblock" hov="0.8">
							<div class="pic"><img src=<?= Yii::$app->request->getBaseUrl().'/client/'.$client_model->logo ?> class="v-centerimg" alt="" /></div>
							<p class="title"><?= $client_model->title ?></p>
							<p class="name">／Client</p>
						</a>
						<? endif; ?>

						<? if(0 != strcmp( $model->designer_id, "0_no_designer")): ?>
						<a href= <?= "index.php?r=designer%2Fview&id=".$designer_model->designer_id ?> class="portfolio-avatar mg-b-15 inlineblock" hov="0.8">
							<div class="pic"><img src=<?= Yii::$app->request->getBaseUrl().'/designer/'.$designer_model->photo ?> class="v-centerimg" alt="" /></div>
							<p class="title"><?= $designer_model->title ?></p>
							<p class="name">／Design</p>
						</a>
						<? endif; ?>

						<div class="page-inner-text mg-b-40">
							<p><?= str_replace("\n","<br>" , $model->content); ?></p>
						</div>

					</div>
					<!--sticky fixed area-->

					<!--sticky over area-->
					<div class="sticky-over">

						<div class="page-inner-text mg-b-40">
							<h3 class="title">SPEC</h3>
							<p><?= str_replace("\n","<br>" , $model->spec); ?></p>
						</div>

						<div class="page-inner-text mg-b-40">
							<h3 class="title">TAG</h3>
							<div class="tag-wrap">
								<?php
									$portfolio_tag = explode(",",$model->tag);
									foreach ($portfolio_tag as $tag){
										echo '<a href="/langwin/web/index.php?r=portfolio%2Findex&search='.$tag.'" class="one-tag">'.$tag.'</a>';
									}
								?>
							</div>
						</div>
					</div>
					<!--sticky over area-->
				</div>

				<div class="portfolio-grid-2-r popup-gallery">

				<?php
					if(is_array($photos)){
						foreach ($photos as $key => $value) {
							echo '<a href="'.$value.'" class="portfolio-pic">';
//							echo '<a href="'.$value.'" class="portfolio-pic" title="文字文字文描述">';
							echo '<div class="cover"><span class="v-helper"></span><i class="fas fa-search-plus"></i></div>';
							echo '<img src="'.$value.'" alt="" /></a>';
						}
					}
				?>
				</div>
			</div>
			<!--rwd width limited -->
		</section>
		<!--full width block-->
	</div>
	<!--end main-->