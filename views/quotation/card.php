<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="tab-2" class="tab-con">
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
		</div>

		<?php
			//尺寸 radio
			$size_radio_array = [
				['label' => 'A5 (14.8x21cm)', 'opt' => 'A5'],
				['label' => 'A6 (14.8x10.5cm)', 'opt' => 'A6 (明信片)'],
				['label' => '32K (19x13cm)', 'opt' => '32K'],
				['label' => '18x13.5cm', 'opt' => '18x13.5cm'],
				['label' => '18x27m', 'opt' => '18x27cm'],
			];
			echo $this->render('radio_opt', [
					'title' => '尺寸 (展開尺寸)', 
					'radio_array' => $size_radio_array, 
					'name' => 'size', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他',
			]);
		?>

		<div class="mg-r-20 mg-b-40 contact-wrap">
			<h3 class="contact-title">紙張</h3>
			<div>
				<div class="inlineblock">
					<select class="nice-sel-wrap" name="paper" required >
						<option value="" disabled selected>選擇紙張種類</option>
						<option value="一級卡250g">一級卡250g</option>
						<option value="萊妮卡240g">萊妮卡240g</option>
						<option value="安格紙300g">安格紙300g</option>
						<option value="一級卡+單面亮">一級卡+單面亮</option>
						<option value="一級卡+單面霧">一級卡+單面霧</option>
						<option value="一級卡+雙面亮">一級卡+雙面亮</option>
						<option value="一級卡+雙面霧">一級卡+雙面霧</option>
						<option value="一級卡+單霧單局部">一級卡+單霧單局部</option>
						<option value="一級卡+雙霧單局部">一級卡+雙霧單局部</option>
						<option value="頂級卡300g">頂級卡300g</option>
						<option value="頂級卡+雙面亮">頂級卡+雙面亮</option>
						<option value="頂級卡+雙面霧">頂級卡+雙面霧</option>
						<option value="頂級卡+雙霧雙局部">頂級卡+雙霧雙局部</option>
						<option value="頂級象牙420g">頂級象牙420g</option>
						<option value="炫光紙250g">炫光紙250g</option>
						<option value="絲絨卡">絲絨卡</option>
						<option value="絲絨卡+單局部">絲絨卡+單局部</option>
						<option value="else">其他(請直接填寫) 或需建議 (請填寫希望的質感、基重等需求)</option>
					</select>
				</div>
			</div>

		</div>

		<?php
			//印刷 radio
			$color_radio_array = [
				['label' => '彩色', 'opt' => '彩色'],
				['label' => '無印刷', 'opt' => '無印刷'],
			];
			echo $this->render('radio_opt', [
					'title' => '印刷', 
					'radio_array' => $color_radio_array, 
					'name' => 'color', 
					'required' => true, 
					'other' => true,
					'other_label' => '其他',
			]);
		?>

		<?php
			//單雙面 radio
			$side_radio_array = [
				['label' => '單面', 'opt' => '單面'],
				['label' => '雙面', 'opt' => '雙面'],
			];
			echo $this->render('radio_opt', [
					'title' => '單雙面', 
					'radio_array' => $side_radio_array, 
					'name' => 'side', 
					'required' => true, 
					'other' => false,
					'other_label' => '',
			]);
		?>

		<?php
			//加工 chekcbox
			$addtional_chekcbox_array = [
				['label' => '燙亮金', 'opt' => '燙亮金'],
				['label' => '燙霧金', 'opt' => '燙霧金'],
				['label' => '燙亮銀', 'opt' => '燙亮銀'],
				['label' => '燙霧銀', 'opt' => '燙霧銀'],
				['label' => '打凸', 'opt' => '打凸'],
				['label' => '打凹', 'opt' => '打凹'],
				['label' => '刀模軋型', 'opt' => '刀模軋型'],
				['label' => '中壓一線', 'opt' => '中壓一線'],
				['label' => '雷射雕刻', 'opt' => '雷射雕刻'],
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
	<div class="mg-t-20 mg-b-40"><button type="submit" class="btn c-btn" hov="0.8" name="quotation_card">送出<i class="fas fa-angle-right mg-l-15"></i></button></div>

	<?php ActiveForm::end(); ?>

</div>

