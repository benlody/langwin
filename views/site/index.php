<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = '光隆印刷廠股份有限公司 - 台北優質印刷服務';
?>
	<!--visual-->
	<!-- 首頁LOGO -->
	<div class="flexslider f_index" style="width:100%;overflow:hidden;margin-bottom:0;">
		<ul class="slides">
			<li class="relative">
				<a href="#" class="visual-link" hov="0.92"><img src="images/tmp/index-visual-1.jpg" class="v-centerimg" alt="" /></a>
			</li>
			<li class="relative">
				<a href="#" class="visual-link" hov="0.92"><img src="images/tmp/index-visual-1.jpg" class="v-centerimg" alt="" /></a>
			</li>
		</ul>
	</div>
	<!-- 首頁LOGO -->
	<!---visual-->

	<!--start main-->
	<div class="wrapper">

		<!--SERVICE INTRO SECTION-->
		<!--full width block-->
		<section class="index-serviceinfo-bg pd-v-50">
			<!--rwd width limited-->
			<div class="rwd-width-limited">
				<div class="pd-h-10 mg-b-40">
					<!--title & tab-->
					<div class="clearfix index-tab mg-b-10 ">
						<h2 class="text-24 lh-40 color-d-blue bold left">服務介紹</h2>
					</div>
					<!--title & tab-->
					<p class="text-15 lh-30 color-gray-666">一小段文字敘述一小段，文字敘述一小段文字敘述！</p>
				</div>
				<div class="regular slider si-slider">
					<?php
						foreach ($service_list as $key => $value) {
							print_r($key);
							print_r($value);
							$out = "<a href='/langwin/web/index.php?r=portfolio%2Findex&search=".$value['name']."' class='relative si-item'>";
							$out = $out."<img src='".$value['bg_src']."' alt='' class='v-centerimg' />";
							$out = $out."<div class='cover'></div><div class='con'><div class='v-helper'></div><div class='inlineblock vmiddle'>";
							$out = $out."<div class='ico'><img src='".$value['ico_src']."' alt='' /></div>";
							$out = $out."<h3 class='title'>".$value['name']."</h3></div></div></a>";
							echo $out;
						}
					?>
					<!--one item
					<a href='/langwin/web/index.php?r=portfolio%2Findex&search=名片' class='relative si-item'>
						<img src='' alt='' class='v-centerimg' />
						<div class='cover'></div>
						<div class='con'>
							<div class='v-helper'></div>
							<div class='inlineblock vmiddle'>
								<div class='ico'><img src='images/index/si-ico-ncard.png' alt='' /></div>
								<h3 class='title'>名片</h3>
							</div>
						</div>
					</a>
					one item-->
				</div>

				<div class="tcenter">
					<div class="mg-t-40 index-si-search">
						<form action="/langwin/web/index.php" method="get">
							<input type="hidden" name="r" value="portfolio/index">
							<input type="search" name="search" class="input-text" placeholder="找不到你要的？試試搜尋功能！" />
							<button type="submit" class="search-mag"><i class="fas fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
			<!--rwd width limited -->
		</section>
		<!--full width block-->
		
		
		<!--full width block-->
		<!-- DESIGNER SECTION -->
		<section class="pd-v-50">
			<!--rwd width limited-->
			<div class="rwd-width-limited">
				<div class="pd-h-10 mg-b-40">
					<div class="inlineblock index-designer-top-l">
						<!--title & tab-->
						<div class="clearfix index-tab mg-b-10 ">
							<h2 class="text-24 lh-40 color-d-blue bold left">設計師</h2>
						</div>
						<!--title & tab-->
						<p class="text-15 lh-30 color-gray-666">一小段文字敘述一小段，文字敘述一小段文字敘述！</p>
					</div>
					<div class="inlineblock index-designer-top-r"><a href="#" class="btn btn-yel " hov="0.8">設計師合作方案<i class="fas fa-angle-right mg-l-15"></i></a></div>
				</div>

				<div class="clearfix flex-sec">
				<?php
					foreach ($designer_array as $designer) {
						$desginer_photo = Yii::$app->request->getBaseUrl().'/designer/'.$designer['photo'];
						$desginer_thumb = Yii::$app->request->getBaseUrl().'/images/'.$designer['thumb1'];
						$desginer_name = $designer['title'];
						$desginer_link = 'index.php?r=designer%2Fview&id='.$designer['designer_id'];

						$item = "<a href='".$desginer_link."' class='one-designer flex-3' hov='0.8'>";
						$item = $item."<div class='pic'><img src='".$desginer_thumb."' class='v-centerimg' alt='' /></div><div class='info'>";
						$item = $item."<div class='avatar'><img src='".$desginer_photo."' alt='' class='v-centerimg' /></div>";
						$item = $item."<div class='title'><h3>".$desginer_name."</h3></div></div></a>";
						echo $item;
					}
				?>
				</div>

				<div class="tcenter mg-t-20"><a href="index.php?r=designer%2Findex" class="btn" hov="0.8">更多<i class="fas fa-angle-right mg-l-15"></i></a></div>
			</div>
			<!--rwd width limited -->
		</section>
		<!--full width block-->
		
		
		<!--full width block-->
		<!-- IMAGE SECTION -->
		<section class="index-banner">
			<!--大圖小圖-->
			<a href="#" class="block" hov="0.8">
				<div class="index-banner-pic"><img src="images/tmp/index-visual-1.jpg" class="v-centerimg" alt=""></div>
				<!--rwd width limited-->
				<div class="rwd-width-limited index-banner-inner">
					<div class="v-helper vmiddle"></div>
					<!--內圖在 580 x 420 內皆可-->
					<!--內圖
					<div class="innerimg"><img src="images/tmp/asdasdsadd.png" alt="" /></div>
					內圖-->
					<!--內圖在 580 x 420 內皆可-->

					<!--文字編輯器
					<div class="innertext">
						<p>
							測試測試測試測試側<br />
							測試測試測試<br />
							測試測試測試測試側<br />
							測試測試測試測試側<br />
							測試測試測試測試側測試測試測試測試側測試測試測試
						</p>
					</div>
					<文字編輯器-->
				</div>
			<!--rwd width limited -->
			</a>
			<!--大圖小圖-->
		</section>
		<!--full width block-->
		
		
		<!--full width block-->
		<section class="pd-v-50 bg-yf">
			<!--rwd width limited-->
			<div class="rwd-width-limited">
				<div class="pd-h-10 mg-b-40">
					<!--title & tab-->
					<div class="clearfix index-tab mg-b-10">
						<h2 class="text-24 lh-40 color-d-blue bold left">作品列表</h2>
					</div>
					<!--title & tab-->
					<p class="text-15 lh-30 color-gray-666">一小段文字敘述一小段，文字敘述一小段文字敘述！</p>
				</div> 
				<div class="clearfix flex-sec">


				<?php
					foreach ($portfolio_array as $portfolio) {
						$portfolio_p_title = $portfolio['p_title'];
						$portfolio_d_title = $portfolio['d_title'];
						$portfolio_c_title = $portfolio['c_title'];
						$portfolio_link = 'index.php?r=portfolio%2Fview&id='.$portfolio['portfolio_id'];
						$portfolio_thumb = Yii::$app->request->getBaseUrl().'/images/'.$portfolio['portfolio_id'].'/'.$portfolio['thumb'];
						$portfolio_tag = explode(",",$portfolio['tag']);

						$item = "<div class='one-portfolio flex-3'>";
						$item = $item."<a href='".$portfolio_link."' class='one-portfolio-top' hov='0.8'>";
						$item = $item."<div class='pic'><img src='".$portfolio_thumb."' class='v-centerimg' alt='' /></div>";
						$item = $item."<div class='info'>";
						$item = $item."<div class='title'><h3>".$portfolio_p_title."'</h3></div>";
						$item = $item."<div class='sub-info'><div class='sub-title-wrap'>";
						$item = $item."<p class='sub-title'><span>Design</span>".$portfolio_d_title."</p>";
						$item = $item."<p class='sub-title'><span>Client</span>".$portfolio_c_title."</p>";
						$item = $item."</div></div><div class='line'></div></div></a><div class='tag-wrap'>";
						for ($idx = 0; $idx < 4; $idx++){
							if(!$portfolio_tag[$idx]){
								break;
							}
							$item = $item."<a href='/langwin/web/index.php?r=portfolio%2Findex&search=".$portfolio_tag[$idx]."' class='one-tag'>".$portfolio_tag[$idx]."</a>";
						}
						$item = $item."</div></div>";
						echo $item;
					}
				?>
					<!--one portfolio-->
					<!--div class="one-portfolio flex-3">
						<a href="portfolio-inner.html" class="one-portfolio-top" hov="0.8">
							<div class="pic"><img src="images/tmp/BU8B3150.jpg" class="v-centerimg" alt="" /></div>
							<div class="info">
								<div class="title"><h3>有心咖啡菜單有心咖啡菜單</h3></div>
								<div class="sub-info">
									<div class="sub-title-wrap">
										<p class="sub-title"><span>Design</span>開和跳工作室</p>
										<p class="sub-title"><span>Client</span>有心咖啡</p>
									</div>  
								</div>
								<div class="line"></div>
							</div>
						</a>
						<div class="tag-wrap">
							<a href="#" class="one-tag">菜單</a>
							<a href="#" class="one-tag">菜單</a>
						</div>
					</div-->
					<!--one portfolio-->
				</div>
				<div class="tcenter mg-t-20"><a href="/langwin/web/index.php?r=portfolio%2Findex" class="btn" hov="0.8">更多<i class="fas fa-angle-right mg-l-15"></i></a></div>
			</div>
			<!--rwd width limited -->
		</section>
		<!--full width block-->
	</div>
	<!--end main-->