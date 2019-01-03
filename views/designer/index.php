<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\DesignerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "光隆印刷廠股份有限公司 - 台北優質印刷服務 - 合作設計師";
//$this->params['breadcrumbs'][] = $this->title;
?>


<!--visual-->
<div class="page-visual">
	<div class="pic"><div class="cover"></div><img src="images/tmp/designer-visual.jpg" class="v-centerimg" alt="" /></div>	
	<div class="title"><span class="v-helper"></span><h2>DESIGNERS</h2></div>
</div>
<!---visual-->

<!--start main-->
<div class="wrapper">
	<!--full width block-->
	<section class="pd-v-50 bg-yf">
		<!--rwd width limited-->
		<div class="rwd-width-limited clearfix">
			<div class="mg-b-40 pd-h-10">
				<div class="inlineblock index-designer-top-l">
					<!--title & tab-->
					<div class="clearfix index-tab mg-b-10">
						<h2 class="text-24 lh-40 color-d-blue bold left">設計師列表</h2>
					</div>
					<!--title & tab-->
				</div>
				<div class="inlineblock index-designer-top-r">
					<div class="inlineblock index-designer-top-r"><a href="https://docs.google.com/forms/d/e/1FAIpQLSch5rZavUyKCS_e6CFouqkFxyf3Zd31MgSeSUf8HH6XfHB4tQ/viewform" target="_blank" class="btn btn-yel " hov="0.8">設計師合作方案<i class="fas fa-angle-right mg-l-15"></i></a></div>
				</div>
			</div>
			<div class="clearfix flex-sec portfolio-page">
			<?php
				foreach ($designer_array as $designer) {
					$desginer_photo = Yii::$app->request->getBaseUrl().'/designer/'.$designer['photo'];
					if ($designer['thumb2'] != ''){
						$desginer_thumb = Yii::$app->request->getBaseUrl().'/designer/'.$designer['thumb2'];
					} else {
						$desginer_thumb = Yii::$app->request->getBaseUrl().'/images/'.$designer['thumb1'];
					}
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
			<nav class="page-menu relative">
				<ul class="tcenter">
					<?php
						if($page == 1){
							echo '<li class="inlineblock"><a href="index.php?r=designer%2Findex">上一頁</a></li>';
						} else {
							echo '<li class="inlineblock"><a href="index.php?r=designer%2Findex&page='.($page-1).'">上一頁</a></li>';
						}
						for ($idx = $page-3; $idx < $page; $idx++){
							if($idx > 0){
								echo '<li class="inlineblock page"><a href="index.php?r=designer%2Findex&page='.$idx.'">'.$idx.'</a></li>';
							}
						}
						echo '<li class="inlineblock page active"><a>'.$page.'</a></li>';
						for ($idx = $page+1; $idx < $page+4; $idx++){
							if($idx <= $page_max){
								echo '<li class="inlineblock page"><a href="index.php?r=designer%2Findex&page='.$idx.'">'.$idx.'</a></li>';
							}
						}
//					<li class="inlineblock page active"><a href="#">1</a></li>
//					<li class="inlineblock page"><a href="#">2</a></li>
						if($page == $page_max){
							echo '<li class="inlineblock"><a href="index.php?r=designer%2Findex&page='.($page_max).'">下一頁</a></li>';
						} else {
							echo '<li class="inlineblock"><a href="index.php?r=designer%2Findex&page='.($page+1).'">下一頁</a></li>';
						}
					?>
				</ul>
			</nav>
				
		</div>
		<!--rwd width limited -->
	</section>
	<!--full width block-->
</div>
<!--end main-->