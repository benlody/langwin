<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="tab-7" class="tab-con">
	<?php $form = ActiveForm::begin(); ?>

	<div class="clearfix">

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">公司名稱</h3>
			<input type="text" name="Quotation[company]" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">產品名稱</h3>
			<input type="text" name="Quotation[product]" class="input-text block" required />
		</div><br>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">聯絡人</h3>
			<input type="text" name="Quotation[contact]" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">聯絡電話</h3>
			<input type="text" name="Quotation[tel]" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">Email</h3>
			<input type="text" name="Quotation[email]" class="input-text block" required />
		</div><br>

		<?php
			$box_type_radio_array = [
				['label' => '普通盒<img src="images/tmp/box2.png">', 'opt' => '普通盒'],
				['label' => '插底盒<img src="images/tmp/box2.png">', 'opt' => '插底盒'],
				['label' => '糊底盒<img src="images/tmp/box2.png">', 'opt' => '糊底盒'],
				['label' => '抽屜盒<img src="images/tmp/box1.png">', 'opt' => '抽屜盒'],
				['label' => '天地盒<img src="images/tmp/box3.png">', 'opt' => '天地盒'],
				['label' => 'PIZZA盒<img src="images/tmp/box4.png">', 'opt' => 'PIZZA盒'],
			];
			echo $this->render('radio_opt', [
					'title' => '盒形', 
					'radio_array' => $box_type_radio_array, 
					'name' => 'box_type', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他',
			]);
		?>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">W</h3>
			<input type="text" name="width" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">L</h3>
			<input type="text" name="length" class="input-text block" required />
		</div>

		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">H</h3>
			<input type="text" name="height" class="input-text block" required />
		</div>

		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">紙張</h3>
			<div>
				<div class="inlineblock">
					<select class="nice-sel-wrap" name="paper" required >
						<option value="" disabled selected>選擇紙張種類</option>
						<option value="鑽卡36T">鑽卡36T</option>
						<option value="鑽卡41T">鑽卡41T</option>
						<option value="鑽卡46T">鑽卡46T</option>
						<option value="鑽卡51T">鑽卡51T</option>
						<option value="綺麗卡36T">綺麗卡36T</option>
						<option value="綺麗卡41T">綺麗卡41T</option>
						<option value="綺麗卡46T">綺麗卡46T</option>
						<option value="綺麗卡51T">綺麗卡51T</option>
						<option value="白卡35T">白卡35T</option>
						<option value="白卡40T">白卡40T</option>
						<option value="白卡45T">白卡45T</option>
						<option value="白卡50T">白卡50T</option>
						<option value="牛皮卡38T">牛皮卡38T</option>
						<option value="牛皮卡43T">牛皮卡43T</option>
						<option value="牛皮卡46T">牛皮卡46T</option>
						<option value="牛皮卡51T">牛皮卡51T</option>
						<option value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)</option>
					</select>
				</div>
			</div>

		</div>

		<?php
			//印刷 radio
			$color_radio_array = [
				['label' => '彩色(一般四色印刷)', 'opt' => '彩色(一般四色印刷)'],
				['label' => '無印刷', 'opt' => '無印刷'],
			];
			echo $this->render('radio_opt', [
					'title' => '印刷', 
					'radio_array' => $color_radio_array, 
					'name' => 'color', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他 (特別色/黑色)',
			]);
		?>

		<?php
			//加工 chekcbox
			$addtional_chekcbox_array = [
				['label' => '上亮膜', 'opt' => '上亮膜'],
				['label' => '上霧膜', 'opt' => '上霧膜'],
				['label' => '上霧膜+局部光', 'opt' => '上霧膜+局部光'],
				['label' => '燙亮金', 'opt' => '燙亮金'],
				['label' => '燙霧金', 'opt' => '燙霧金'],
				['label' => '燙亮銀', 'opt' => '燙亮銀'],
				['label' => '燙霧銀', 'opt' => '燙霧銀'],
			];
			echo $this->render('checkbox_opt', [
					'title' => '加工（可複選）', 
					'radio_array' => $addtional_chekcbox_array, 
					'name' => 'addtional', 
					'required' => false, 
					'other' => true,
					'other_label' => '其他加工／燙其他色箔(黑/紅/古銅金/白/珍珠箔...) (請填寫)',
			]);
		?>


		<div class="inlineblock mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">數量 (可輸入多個數量)</h3>
			<input type="text" name="qty" class="input-text block" required />
		</div>

		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">檔案雲端連結</h3>
			<textarea class="input-textarea block" name="Quotation[link]" ></textarea>
		</div>

		<!--textarea-->
		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">備註</h3>
			<textarea class="input-textarea block" name="remark"></textarea>
		</div>
		<!--textarea-->

	</div>
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_box">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>

