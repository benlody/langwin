<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '光隆印刷廠股份有限公司 - 台北優質印刷服務 - 精選作品';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!--visual-->
<div class="page-visual">
	<div class="pic"><div class="cover"></div><img src="images/tmp/girl-791231.jpg" class="v-centerimg" alt="" /></div>
	<div class="title"><span class="v-helper"></span><h2>PORTFOLIOS</h2></div>
</div>
<!---visual-->

<!--start main-->
<div class="wrapper">
	<!--full width block-->
	<section class="pd-v-50 bg-yf">
		<!--rwd width limited-->
		<div class="rwd-width-limited clearfix">

			<?php
			/*
			<div class="portfolio-grid-4-1">
				<ul class="sidebar">
					<!--layer-1-->
					<li>
						<a class="link active" href="#"><h3>全部</h3></a>
					</li>
					<!--layer-1-->
					<!--layer-1-->
					<li>
						<a class="toggle" href="#"><h3>卡片</h3></a>
						<!--layer-1-inner-->href="#" class="link"><h3>測試測試測試測試</h3></a>
										<a
						<ul class="inner">
							<!--layer-2-->
							<li>
								<a href="#" class="link"><h3>全部卡片</h3></a>
								<a href="#" class="toggle"><h3>節慶卡片</h3></a>
								<!--layer-2-inner-->
								<ul class="inner">
									<!--layer-3-->
									<li>
										<a href="#" class="link"><h3>生日卡片</h3></a>
										<a  href="#" class="link"><h3>測試測試測試測</h3></a>
									</li>
									<!--layer-3-->
								</ul>
								<!--layer-2-inner-->
								<a href="#" class="toggle"><h3>測試測試2</h3></a>
								<!--layer-2-inner-->
								<ul class="inner">
									<!--layer-3-->
									<li>
										<a href="#" class="link"><h3>測試測試2</h3></a>
										<a href="#" class="link"><h3>測試測試測試測試</h3></a>
									</li>
									<!--layer-3-->
								</ul>
								<!--layer-2-inner-->
							</li>
							<!--layer-2-->
						</ul>
						<!--layer-1-inner-->
					</li>
					<!--layer-1-->
					<!--layer-1-->
					<li>
						<a class="toggle" href="#"><h3>DM</h3></a>
						<!--layer-1-inner-->
						<ul class="inner">
							<!--layer-2-->
							<li>
								<a href="#" class="link"><h3>全部DM</h3></a>
								<a href="#" class="toggle"><h3>節慶DM</h3></a>
								<!--layer-2-inner-->
								<ul class="inner">
									<!--layer-3-->
									<li>
										<a href="#" class="link"><h3>廣告</h3></a>
										<a href="#" class="link"><h3>測試測試測試測試</h3></a>
										<a href="#" class="link"><h3>測試測試測試測</h3></a>
									</li>
									<!--layer-3-->
								</ul>
								<!--layer-2-inner-->
								<a href="#" class="toggle"><h3>測試測試2</h3></a>
								<!--layer-2-inner-->
								<ul class="inner">
									<!--layer-3-->
									<li>
										<a href="#" class="link"><h3>測試測試2</h3></a>
										<a href="#" class="link"><h3>測試測試測試測試</h3></a>
									</li>
									<!--layer-3-->
								</ul>
								<!--layer-2-inner-->
							</li>
							<!--layer-2-->
						</ul>
						<!--layer-1-inner-->
					</li>
					<!--layer-1-->
				</ul>
			</div>
			*/
			?>
			
			<div class="portfolio-grid-4-4">
				<div class="mg-b-40 pd-h-10">
					<div class="inlineblock index-designer-top-l">

						<!--title & tab-->
						<div class="clearfix index-tab">
							<h2 class="text-24 lh-40 color-d-blue bold left">作品列表</h2>
						</div>
						<!--title & tab-->

						<?php
							if(0 != strcmp($search, '')){
								echo '<p class="text-15 lh-30 color-gray-666">搜尋結果 <i class="fas fa-angle-right mg-h-10"></i> '.$search.'</p>';
							}
						?>

					</div>

					<div class="inlineblock index-designer-top-r">
						<!--search-->
						<div class="page-search">
							<form class="menu-search-form" action= <?=Yii::$app->request->getBaseUrl()."/index.php"?> method="get">
								<input type="hidden" name="r" value="portfolio/index">
								<input type="text" name="search" class="input-text" placeholder="搜尋關鍵字" />
								<button type="submit" class="search-mag"><i class="fas fa-search"></i></button>
							</form>
						</div>
						<!--search-->
					</div>
				</div>
			
				<div class="clearfix flex-sec portfolio-page">
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
						$item = $item."<div class='title'><h3>".$portfolio_p_title."</h3></div>";
						$item = $item."<div class='sub-info'><div class='sub-title-wrap'>";

							if($portfolio_d_title != '--'){
								$item = $item."<p class='sub-title'><span>Design</span>".$portfolio_d_title."</p>";
							}
							if($portfolio_c_title != '--'){
								$item = $item."<p class='sub-title'><span>Client</span>".$portfolio_c_title."</p>";
							}

						$item = $item."</div></div><div class='line'></div></div></a>";

							$item = $item."<div class='tag-wrap'>";
							for ($idx = 0; $idx < 4; $idx++){
								if(!isset($portfolio_tag[$idx])){
									break;
								}
								$item = $item."<a href='".Yii::$app->request->getBaseUrl()."/index.php?r=portfolio%2Findex&search=".$portfolio_tag[$idx]."' class='one-tag'>".$portfolio_tag[$idx]."</a>";
							}
							$item = $item."</div>";

						$item = $item."</div>";
						echo $item;
					}
				?>
				</div>
				<nav class="page-menu relative">
					<ul class="tcenter">
						<?php
							if(0 != strcmp($search, '')){
								$search_param = "&search=".$search;
							} else {
								$search_param = '';
							}


							if($page == 1){
								echo '<li class="inlineblock"><a href="index.php?r=portfolio%2Findex'.$search_param.'">上一頁</a></li>';
							} else {
								echo '<li class="inlineblock"><a href="index.php?r=portfolio%2Findex'.$search_param.'&page='.($page-1).'">上一頁</a></li>';
							}
							for ($idx = $page-3; $idx < $page; $idx++){
								if($idx > 0){
									echo '<li class="inlineblock page"><a href="index.php?r=portfolio%2Findex'.$search_param.'&page='.$idx.'">'.$idx.'</a></li>';
								}
							}
							echo '<li class="inlineblock page active"><a href="#">'.$page.'</a></li>';
							for ($idx = $page+1; $idx < $page+4; $idx++){
								if($idx <= $page_max){
									echo '<li class="inlineblock page"><a href="index.php?r=portfolio%2Findex'.$search_param.'&page='.$idx.'">'.$idx.'</a></li>';
								}
							}
	//					<li class="inlineblock page active"><a href="#">1</a></li>
	//					<li class="inlineblock page"><a href="#">2</a></li>
							if($page == $page_max){
								echo '<li class="inlineblock"><a href="index.php?r=portfolio%2Findex'.$search_param.'&page='.($page_max).'">下一頁</a></li>';
							} else {
								echo '<li class="inlineblock"><a href="index.php?r=portfolio%2Findex'.$search_param.'&page='.($page+1).'">下一頁</a></li>';
							}
						?>
					</ul>
				</nav>
			</div>
		</div>
		<!--rwd width limited -->
	</section>
	<!--full width block-->
</div>
<!--end main-->