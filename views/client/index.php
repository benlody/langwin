<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!--visual-->
<div class="page-visual">
	<div class="pic"><div class="cover"></div><img src="images/tmp/client-visual.jpg" class="v-centerimg" alt="" /></div>
	<div class="title"><span class="v-helper"></span><h2>CLIENTS</h2></div>
</div>
<!---visual-->

<!--start main-->
<div class="wrapper">
	<!--full width block-->
	<section class="pd-v-50 bg-yf">
		<!--rwd width limited-->
		<div class="rwd-width-limited clearfix">
			<div class="portfolio-grid-4-1">
				<ul class="sidebar">
					<?php
						$group_name = '';
						if($client_group_id <=0 ){
							$group_name = '全部客戶';
							echo '<li><a class="link active" href="index.php?r=client%2Findex"><h3>全部</h3></a></li>';
						} else {
							echo '<li><a class="link" href="index.php?r=client%2Findex"><h3>全部</h3></a></li>';
						}
						foreach ($group_array as $group => $value) {
							if($client_group_id == $value['client_group_id'] ){
								$group_name = $value['chinese_name'];
								echo '<li><a class="link active" href="index.php?r=client%2Findex&client_group_id='.$value['client_group_id'].'"><h3>'.$value['chinese_name'].'</h3></a></li>';
							} else {
								echo '<li><a class="link" href="index.php?r=client%2Findex&client_group_id='.$value['client_group_id'].'"><h3>'.$value['chinese_name'].'</h3></a></li>';
							}
						}
					?>
				</ul>
			</div>

			<div class="portfolio-grid-4-3">
				<div class="mg-b-40 pd-h-10">
					<!--title & tab-->
					<div class="clearfix index-tab mg-b-10">
						<h2 class="text-24 lh-40 color-d-blue bold left">客戶列表</h2>
					</div>
					<!--title & tab-->
					<p class="text-15 lh-30 color-gray-666"><?= $group_name ?></p>
				</div>

				<div class="clearfix flex-sec portfolio-page">
					<?php

						foreach ($client_array as $client => $value) {
							echo '<a href="index.php?r=portfolio%2Findex&search='.$value['title'].'" class="one-client flex-4">';
							echo '<div class="pic"><div class="cover"><span class="v-helper"></span><i class="fas fa-arrow-right"></i></div>';
							echo '<img src="client/'.$value['logo'].'" class="v-centerimg" alt="" /></div>';
							echo '<div class="title"><h3>'.$value['title'].'</h3></div></a>';
						}
					?>
				</div>
			</div>
		</div>
		<!--rwd width limited -->
	</section>
	<!--full width block-->
</div>
<!--end main-->