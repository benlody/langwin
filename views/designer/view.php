<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Designer */

$this->title = "光隆印刷廠股份有限公司 - 台北優質印刷服務 - 合作設計師 - ".$model->title;
?>

<!--visual-->
<div class="page-visual">
	<div class="pic"><div class="cover"></div><img src= <?= Yii::$app->request->getBaseUrl().'/images/'.$model->thumb1 ?> class="v-centerimg" alt="" /></div>
	<div class="title"><span class="v-helper"></span><h2><?= $model->title ?></h2></div>
</div>
<!---visual-->

<!--start main-->
<div class="wrapper">
	<?php
	/*
	<!--contact designer-->
	<div class="contact-designer">
		<button class="cd-btn"><i class="fas fa-comments"></i><br />聯<br />絡<br />設<br />計<br />師</button>
	</div>
	*/
	?>
	<!--contact designer-->
	<!--full width block-->
	<section class="pd-v-50 bg-yf">
		<!--rwd width limited-->
		<div class="rwd-width-limited clearfix">
			<div class="portfolio-grid-2-l">
				<!--sticky fixed area-->
				<div class="sticky unfixed">
					<div class="clearfix mg-b-30 relative">
						<div class="designer-top-r">
							<div class="designer-avatar"><span class="v-helper"></span><img src= <?= Yii::$app->request->getBaseUrl().'/designer/'.$model->photo ?> alt="" class="v-centerimg" /></div>
						</div>
						<div class="designer-top-l">
							<div class="mg-b-30">
								<!--title & tab-->
								<div class="clearfix index-tab mg-b-10">
									<h2 class="text-24 lh-40 color-d-blue bold left"><?= $model->title ?></h2>
								</div>
								<!--title & tab-->
							</div>
							<div>
								<!--social-->
								<div class="designer-social">
									<!-- FIXME -->
									<a href= <?= $model->website ?> target="_blank"><span class="v-helper"></span><i class="fas fa-globe"></i></a>
									<a href= <?= $model->facebook ?> target="_blank"><span class="v-helper"></span><i class="fab fa-facebook-f"></i></a>
									<a href= <?= $model->instagram ?> target="_blank"><span class="v-helper"></span><i class="fab fa-instagram"></i></a>
									<a href= <?= $model->behance ?> target="_blank"><span class="v-helper"></span><i class="fab fa-behance"></i></a>
									<a href= '#' target="_blank"><span class="v-helper"></span><i class="fab fa-line"></i></a>
								</div>
								<!--social-->
							</div>
						</div>
					</div>
				</div>
				<!--sticky fixed area-->
				<!--sticky over area-->
				<div class="sticky-over">
					<div class="page-inner-text mg-b-40">
						<p><?= $model->desc ?></p>
					</div>
				</div>
				<!--sticky over area-->
			</div>
			<div class="portfolio-grid-2-r">

				<?php
					foreach ($portfolio_array as $portfolio) {
						$portfolio_thumb = Yii::$app->request->getBaseUrl().'/images/'.$portfolio["portfolio_id"].'/'.$portfolio["thumb"];
						$portfolio_link = 'index.php?r=portfolio%2Fview&id='.$portfolio['portfolio_id'];
						$portfolio_title = $portfolio["p_title"];
						$portfolio_tag = explode(",",$portfolio['tag']);
						$designer_title = $portfolio["d_title"];
						$client_title = $portfolio["c_title"];

						$item = '<div class="one-portfolio one-portfolio-full">';
						$item = $item.'<a href="'.$portfolio_link.'" class="one-portfolio-top" hov="0.8">';
						$item = $item.'<div class="pic"><img src="'.$portfolio_thumb.'" class="v-centerimg" alt="" /></div>';
						$item = $item.'<div class="info">';
						$item = $item.'<div class="title"><h3>'.$portfolio_title.'</h3></div>';
						$item = $item.'<div class="sub-info"><div class="sub-title-wrap">';
						$item = $item.'<p class="sub-title"><span>Design</span>'.$designer_title.'</p>';
						$item = $item.'<p class="sub-title"><span>Client</span>'.$client_title.'</p>';
						$item = $item.'</div></div><div class="line"></div></div></a><div class="tag-wrap">';
						for ($idx = 0; $idx < 4; $idx++){
							if(!$portfolio_tag[$idx]){
								break;
							}
							$item = $item."<a href='/langwin/web/index.php?r=portfolio%2Findex&search=".$portfolio_tag[$idx]."' class='one-tag'>".$portfolio_tag[$idx]."</a>";
						}
						$item = $item.'</div></div>';
						echo $item;
					}
				/*
				<!--one portfolio-->
				<div class="one-portfolio one-portfolio-full">
					<a href="portfolio-inner.html" class="one-portfolio-top" hov="0.8">
						<div class="pic"><img src="images/tmp/BU8B3150.jpg" class="v-centerimg" alt="" /></div>
						<div class="info">
							<div class="title"><h3>有心咖啡菜單有心菜單</h3></div>
							<div class="sub-info">
								<div class="sub-title-wrap">
									<p class="sub-title"><span>Design</span>開和跳工作室</p>
									<p class="sub-title"><span>Client</span>有心咖啡有心咖啡</p>
								</div>
							</div>
							<div class="line"></div>
						</div>
					</a>
					<div class="tag-wrap">
						<a href="#" class="one-tag">菜單</a>
						<a href="#" class="one-tag">菜單</a>
					</div>
				</div>
				<!--one portfolio-->
				*/
				?>
			</div>
		</div>
		<!--rwd width limited -->
	</section>
	<!--full width block-->
</div>
<!--end main-->
